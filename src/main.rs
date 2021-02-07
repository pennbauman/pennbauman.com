// pennbauman.com
//   URL: https://github.com/pennbauman/pennbauman.com
//   License: GPLv3.0
//   Author:
//     Penn Bauman (pennbauman@protonmail.com)
use tide::{Response, StatusCode};
use tide::utils::After;
use tide_fluent_routes::prelude::*;
use mongodb::{Client, options::ClientOptions, Database};
use tera::Tera;

mod apps;
mod config;

#[derive(Clone)]
pub struct State {
    tera: Tera,
    db: Database,
}
impl State {
    async fn new() -> Result<State, tide::Error> {
        let template_dir: String = match config::path("templates/**/*").await {
            Ok(s) => s,
            Err(_) => return Err(tide::Error::from_str(500, "broken template path")),
        };

        let db_options = ClientOptions::parse(&config::db().await?).await?;
        let client = Client::with_options(db_options)?;

        Ok(State {
            tera: Tera::new(&template_dir)?,
            db: client.database("pennbauman"),
        })
    }
}

#[async_std::main]
async fn main() -> tide::Result<()> {
    tide::log::start();
    let mut app = tide::with_state(State::new().await?);

    // Print basic error messages
    app.with(After(|mut res: Response| async {
        match res.status() {
            StatusCode::Ok => Ok(res),
            _ => {
                let num: u16 = res.status().into();
                res.set_body(format!("{} : {}\n", num, res.status().canonical_reason()));
                Ok(res)
            },
        }
    }));

    // Apps
    app.register(root()
        .at("", apps::core)
        .at("dnd", apps::dnd)
        .at("", apps::links)
    );

    // Basic Server
    app.at(&config::files_path("/").await).serve_dir(&config::files_dir().await?)?;
    app.listen("localhost:8080").await?;

    Ok(())
}

