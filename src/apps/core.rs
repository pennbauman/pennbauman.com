// core website - pennbauman.com
//   URL: https://github.com/pennbauman/pennbauman.com
//   License: GPLv3.0
//   Author:
//     Penn Bauman (pennbauman@protonmail.com)
use tide::{Request, Redirect};
use tera::Tera;
use tide_tera::prelude::*;
use crate::config;

pub async fn routes() -> tide::Server<Tera> {
    // Tera Template Engine
    let mut app = match super::tera_app().await {
        Ok(a) => a,
        Err(_) => panic!("core")
    };

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
    app.at("/resume").all(|_| async { Ok(Redirect::new(config::files_path("Penn_Bauman_Resume.pdf").await)) });

    return app;
}
