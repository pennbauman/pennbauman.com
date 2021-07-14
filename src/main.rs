// pennbauman.com
//   URL: https://github.com/pennbauman/pennbauman.com
//   License: GPLv3.0
//   Author:
//     Penn Bauman (me@pennbauman.com)
use std::env;
use tide::{Request, Response, Redirect, StatusCode};
use tide::utils::After;
use tide_tera::prelude::*;
use tera::Tera;

#[async_std::main]
async fn main() -> tide::Result<()> {
    // Get directories
    let dir: String = env::var("TIDE_DIR")?;
    let templates_dir = dir.to_string() + "/templates/*";

    tide::log::start();
    let mut app = tide::with_state(Tera::new(&templates_dir)?);
    app.at("/files").serve_dir(dir + "/files")?;

    // Print error codes
    app.with(After(|mut res: Response| async {
        match res.status() {
            StatusCode::Ok => Ok(res),
            _ => {
                let num: u16 = res.status().into();
                res.set_body(format!("{}: {}\n", num, res.status().canonical_reason()));
                Ok(res)
            },
        }
    }));

    // Pages
    app.at("/").get(|req: Request<Tera>| async move {
        let tera = req.state();
        tera.render_response("index.html", &context!{})
    });
    app.at("/about").get(|req: Request<Tera>| async move {
        let tera = req.state();
        tera.render_response("about.html", &context!{})
    });
    app.at("/site").get(|req: Request<Tera>| async move {
        let tera = req.state();
        tera.render_response("site.html", &context!{})
    });

    app.at("/github").get(|_req: Request<Tera>| async {
        Ok(Redirect::new("http://github.com/pennbauman"))
    });
    app.at("/resume").get(|_req: Request<Tera>| async {
        Ok(Redirect::new("/files/Penn_Bauman_Resume.pdf"))
    });

    // Run Server
    let addr = match env::var("TIDE_PORT") {
        Ok(p) => format!("0.0.0.0:{}", p),
        Err(_) => String::from("0.0.0.0:8080"),
    };
    app.listen(addr).await?;

    Ok(())
}

