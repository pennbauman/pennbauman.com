// pennbauman.com
//   URL: https://github.com/pennbauman/pennbauman.com
//   License: GPLv3.0
//   Author:
//     Penn Bauman (pennbauman@protonmail.com)
use tide::utils::After;
use tide::{Response, StatusCode};
mod apps;
mod config;

#[async_std::main]
async fn main() -> tide::Result<()> {
    tide::log::start();
    let mut app = apps::new_server().await?;

    // Print basic error messages
    app.with(After(|mut res: Response| async {
        match res.status() {
            StatusCode::Ok => Ok(res),
            _ => {
                let num: u16 = res.status().into();
                res.set_body(format!("{} : {}", num, res.status().canonical_reason()));
                Ok(res)
            },
        }
    }));

    // Apps
    apps::core::routes(&mut app).await;
    apps::dnd::routes(&mut app).await;

    // Basic Server
    app.at(&config::files_path("/").await).serve_dir(&config::files_dir().await?)?;
    app.listen(config::host().await?).await?;

    Ok(())
}

