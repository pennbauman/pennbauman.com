// dnd pages - pennbauman.com
//   URL: https://github.com/pennbauman/pennbauman.com
//   License: GPLv3.0
//   Author:
//     Penn Bauman (pennbauman@protonmail.com)
use tide::{Request, Response};
use tide_tera::prelude::*;
use super::State;
use crate::{path, tera_page};

const HOME: &str = "/dnd";

// DnD Page Routes
pub async fn routes(app: &mut tide::Server<State>) {
    // Routing
    app.at(path!("")).all(tera_page!("dnd/index.html"));
    app.at(path!("/stats")).all(tera_page!("dnd/stats.html"));
    app.at(path!("/dice")).all(tera_page!("dnd/dice.html"));
    app.at(path!("/spells")).all(tera_page!("dnd/spells.html"));
    app.at(path!("/monsters")).all(tera_page!("dnd/monsters.html"));

    // Spells
    app.at(path!("/spells/:school")).all(|req: Request<State>| async move {
        let school: &str = req.param("school")?;
        let tera = &req.state().tera;
        let page = tera.render_response(&format!("dnd/spells/{}.html", school), &context!());
        match page {
            Ok(p) => Ok(p),
            Err(_) => Ok(Response::new(404)),
        }
    });

    // Monsters
    app.at(path!("/monsters/:type")).all(|req: Request<State>| async move {
        let school: &str = req.param("type")?;
        let tera = &req.state().tera;
        let page = tera.render_response(&format!("dnd/monsters/{}.html", school), &context!());
        match page {
            Ok(p) => Ok(p),
            Err(_) => Ok(Response::new(404)),
        }
    });
}
