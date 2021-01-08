// dnd pages - pennbauman.com
//   URL: https://github.com/pennbauman/pennbauman.com
//   License: GPLv3.0
//   Author:
//     Penn Bauman (pennbauman@protonmail.com)
use tide::{Request, Response};
use tide_fluent_routes::prelude::*;
use tide_tera::prelude::*;
use crate::State;
use crate::tera_page;

pub fn routes(routes: RouteSegment<State>) -> RouteSegment<State> {
    routes.all(tera_page!("dnd/index.html"))
        .at("", |route| route.all(tera_page!("dnd/index.html")))
        .at("stats", |route| route.all(tera_page!("dnd/stats.html")))
        .at("dice", |route| route.all(tera_page!("dnd/dice.html")))
        .at("spells", |route| route.all(tera_page!("dnd/spells.html")))
        .at("monsters", |route| route.all(tera_page!("dnd/monsters.html")))

        // Spells
        .at("spells/:school", |route| route.all(|req: Request<State>| async move {
            let school: &str = req.param("school")?;
            let tera = &req.state().tera;
            let page = tera.render_response(&format!("dnd/spells/{}.html", school), &context!());
            match page {
                Ok(p) => Ok(p),
                Err(_) => Ok(Response::new(404)),
            }
        }))

        // Monsters
        .at("monsters/:type", |route| route.all(|req: Request<State>| async move {
            let school: &str = req.param("type")?;
            let tera = &req.state().tera;
            let page = tera.render_response(&format!("dnd/monsters/{}.html", school), &context!());
            match page {
                Ok(p) => Ok(p),
                Err(_) => Ok(Response::new(404)),
            }
        }))
}
