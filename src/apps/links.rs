// link redirects - pennbauman.com
//   URL: https://github.com/pennbauman/pennbauman.com
//   License: GPLv3.0
//   Author:
//     Penn Bauman (pennbauman@protonmail.com)
use async_std::stream::StreamExt;
use tide::{Request, Response, Redirect};
use mongodb::{bson::doc, options::FindOptions};
use super::State;

// Link Redirect Routes
pub async fn routes(app: &mut tide::Server<State>) {
    app.at(":name").all(|req: Request<State>| async move {
        let name: &str = req.param("name")?;
        let collection = &req.state().db.collection("links");

        let filter = doc! { "name": name };
        let find_options = FindOptions::builder().sort(doc! { "name": 1 }).build();
        let mut cursor = collection.find(filter, find_options).await?;

        let mut res = Response::new(404);
        while let Some(result) = cursor.next().await {
            match result {
                Ok(document) => {
                    match document.get_str("url") {
                        Ok(url) => res = Redirect::permanent(url).into(),
                        Err(_) => (),
                    }
                },
                Err(_) => (),
            };
        };
        Ok(res)
    });
}
