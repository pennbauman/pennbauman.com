// core pages - pennbauman.com
//   URL: https://github.com/pennbauman/pennbauman.com
//   License: GPLv3.0
//   Author:
//     Penn Bauman (pennbauman@protonmail.com)
use tide::{Request, Redirect};
use tide_tera::prelude::*;
use crate::config;
use super::State;
use crate::{path, tera_page};

const HOME: &str = "";

// Core Page Routes
pub async fn routes(app: &mut tide::Server<State>) {
    // Core Routing
    app.at(path!("")).all(tera_page!("core/index.html"));
    app.at(path!("/about")).all(tera_page!("core/about.html"));
    app.at(path!("/site")).all(tera_page!("core/site.html"));

    // Redirects
    app.at(path!("/github")).all(|_| async {
        Ok(Redirect::new("http://github.com/pennbauman"))
    });
    app.at(path!("/resume")).all(|_| async {
        Ok(Redirect::new(config::files_path("Penn_Bauman_Resume.pdf").await))
    });
}
