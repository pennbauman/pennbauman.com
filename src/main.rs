use tide::Request;
use tide::Response;

#[async_std::main]
async fn main() -> tide::Result<()> {
    let mut app = tide::new();
    app.at("/").get(|_| async { Ok("Hello, world!") });
    app.at("/test").get(hello_world);
    app.listen("127.0.0.1:8080").await?;
    Ok(())
}

async fn hello_world(mut _req: Request<()>) -> tide::Result {
    println!("hi");
    let mut res = Response::new(200);
    res.set_body("Hello, world!");
    Ok(res)
}
