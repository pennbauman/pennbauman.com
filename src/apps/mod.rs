// apps - pennbauman.com
//   URL: https://github.com/pennbauman/pennbauman.com
//   License: GPLv3.0
//   Author:
//     Penn Bauman (pennbauman@protonmail.com)
mod core;
pub use self::core::routes as core;
mod dnd;
pub use self::dnd::routes as dnd;
mod links;
pub use self::links::routes as links;

#[macro_export]
macro_rules! path {
    ($path:literal) => {
        const_format::formatcp!("{}{}", HOME, $path)
    }
}

#[macro_export]
macro_rules! tera_page {
    ($template:literal) => {
        |req: Request<State>| async move {
            let tera = &req.state().tera;
            tera.render_response($template, &context!{})
        }
    }
}
