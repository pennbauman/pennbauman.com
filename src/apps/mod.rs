// apps - pennbauman.com
//   URL: https://github.com/pennbauman/pennbauman.com
//   License: GPLv3.0
//   Author:
//     Penn Bauman (pennbauman@protonmail.com)
use tera::Tera;
use crate::config;

pub mod dnd;
pub mod core;


pub async fn tera_app() -> Result<tide::Server<Tera>, tide::Error> {
    let template_dir: String = match config::path("templates/**/*").await {
        Ok(s) => s,
        Err(_) => return Err(tide::Error::from_str(500, "broken template path")),
    };
    println!("{}", match config::path("templates/**/*").await {
        Ok(s) => s,
        Err(e) => e.to_string(),
    });
    let mut tera: Tera = Tera::new(&template_dir)?;
    tera.autoescape_on(vec!["html"]);
    Ok(tide::with_state(tera))
}
