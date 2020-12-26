// pennbauman.com
//   URL: https://github.com/pennbauman/pennbauman.com
//   License: GPLv3.0
//   Author:
//     Penn Bauman (pennbauman@protonmail.com)
use std::env;
use tide::{Request, Redirect};
use tera::Tera;
use tide_tera::prelude::*;

// Static Variables
pub static FILES_DIR: &str = "/files/";
pub static FILES_PATH: &str ="/files";

macro_rules! files_path {
    ($local_path:literal) => {
        format!("{}/{}", FILES_PATH, $local_path);
    }
}


#[async_std::main]
async fn main() -> tide::Result<()> {
    tide::log::start();

    let mut tera = Tera::new(&(env::var("TIDE_DIR")? + "/templates/**/*"))?;
    tera.autoescape_on(vec!["html"]);
    let mut app = tide::with_state(tera);

    // Core Routing
    app.at("/").all(|req: Request<Tera>| async move {
        let tera = req.state();
        tera.render_response("core/index.html", &context!{})
    });
    app.at("/about").all(|req: Request<Tera>| async move {
        let tera = req.state();
        tera.render_response("core/about.html", &context!{
            "title" => "About - Penn Bauman",
            "description" => "Penn Bauman is currently attening The University of Virginia. He is majoring Computer Science in the School of Engineering, and minoring in Physics.",
        })
    });
    app.at("/site").all(|req: Request<Tera>| async move {
        let tera = req.state();
        tera.render_response("core/site.html", &context!{
            "title" => "Site - Penn Bauman",
            "description" => "Site information for pennbauman.com"
        })
    });
    app.at("/github").all(|_| async { Ok(Redirect::new("http://github.com/pennbauman")) });
    app.at("/resume").all(|_| async { Ok(Redirect::new(files_path!("Penn_Bauman_Resume.pdf"))) });

    // Basic Server
    app.at(FILES_PATH).serve_dir(&(env::var("TIDE_DIR")? + FILES_DIR))?;
    app.listen(env::var("TIDE_ADDR")? + ":" + &(env::var("TIDE_PORT")?)).await?;
    Ok(())
}

