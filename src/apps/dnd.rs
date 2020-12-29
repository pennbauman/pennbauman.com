// dnd - pennbauman.com
//   URL: https://github.com/pennbauman/pennbauman.com
//   License: GPLv3.0
//   Author:
//     Penn Bauman (pennbauman@protonmail.com)
use tide::{Request, Response};
use tera::Tera;
use tide_tera::prelude::*;

pub async fn routes() -> tide::Server<Tera> {
    // Tera Template Engine
    let mut app = match super::tera_app().await {
        Ok(a) => a,
        Err(_) => panic!("dnd")
    };

    // Routing
    app.at("/").all(|req: Request<Tera>| async move {
        let tera = req.state();
        tera.render_response("dnd/index.html", &context!())
    });
    app.at("/stats").all(|req: Request<Tera>| async move {
        let tera = req.state();
        tera.render_response("dnd/stats.html", &context!())
    });
    app.at("/dice").all(|req: Request<Tera>| async move {
        let tera = req.state();
        tera.render_response("dnd/dice.html", &context!())
    });

    // Spells
    app.at("/spells").all(|req: Request<Tera>| async move {
        let tera = req.state();
        tera.render_response("dnd/spells.html", &context!())
    });
    app.at("/spells/:school").all(|req: Request<Tera>| async move {
        let tera = req.state();
        let school = match req.param("school") {
            Ok(s) => s,
            Err(_) => return Ok(Response::new(404)),
        };
        let page = tera.render_response(&format!("dnd/spells/{}.html", school), &context!());
        match page {
            Ok(p) => Ok(p),
            Err(_) => Ok(Response::new(404)),
        }
    });

    // Spells
    app.at("/monsters").all(|req: Request<Tera>| async move {
        let tera = req.state();
        tera.render_response("dnd/monsters.html", &context!())
    });
    app.at("/monsters/:type").all(|req: Request<Tera>| async move {
        let tera = req.state();
        let school = match req.param("type") {
            Ok(s) => s,
            Err(_) => return Ok(Response::new(404)),
        };
        let page = tera.render_response(&format!("dnd/monsters/{}.html", school), &context!());
        match page {
            Ok(p) => Ok(p),
            Err(_) => Ok(Response::new(404)),
        }
    });

    return app;
}
