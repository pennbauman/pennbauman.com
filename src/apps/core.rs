// core pages - pennbauman.com
//   URL: https://github.com/pennbauman/pennbauman.com
//   License: GPLv3.0
//   Author:
//     Penn Bauman (pennbauman@protonmail.com)
use tide::{Request, Redirect};
use tide_fluent_routes::prelude::*;
use tide_tera::prelude::*;
use crate::config;
use crate::State;
use crate::tera_page;

pub fn routes(routes: RouteSegment<State>) -> RouteSegment<State> {
    routes
        .at("", |route| route.all(tera_page!("core/index.html")))
        .at("about", |route| route.all(tera_page!("core/about.html")))
        .at("site", |route| route.all(tera_page!("core/site.html")))

        .at("github", |route| route.all(|_| async {
            Ok(Redirect::new("http://github.com/pennbauman"))
        }))
        .at("resume", |route| route.all(|_| async {
            Ok(Redirect::new(config::files_path("Penn_Bauman_Resume.pdf").await))
        }))
}
