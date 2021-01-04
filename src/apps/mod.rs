// apps - pennbauman.com
//   URL: https://github.com/pennbauman/pennbauman.com
//   License: GPLv3.0
//   Author:
//     Penn Bauman (pennbauman@protonmail.com)
use tera::Tera;
use crate::config;

pub mod dnd;
pub mod core;

#[derive(Clone)]
pub struct State {
    tera: Tera,
}
impl State {
    async fn new() -> Result<State, tide::Error> {
        let template_dir: String = match config::path("templates/**/*").await {
            Ok(s) => s,
            Err(_) => return Err(tide::Error::from_str(500, "broken template path")),
        };

        Ok(State {
            tera: Tera::new(&template_dir)?,
        })
    }
}

pub async fn new_server() -> Result<tide::Server<State>, tide::Error> {
    Ok(tide::with_state(State::new().await?))
}


#[macro_export]
macro_rules! path {
    ($path:literal) => {
        const_format::formatcp!("{}{}", HOME, $path)
    }
}

#[macro_export]
macro_rules! tera_page {
    ($template:literal) => {
        |req: Request<State>| async move {
            let tera = &req.state().tera;
            tera.render_response($template, &context!{})
        }
    }
}
