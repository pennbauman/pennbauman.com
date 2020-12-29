// config - pennbauman.com
//   URL: https://github.com/pennbauman/pennbauman.com
//   License: GPLv3.0
//   Author:
//     Penn Bauman (pennbauman@protonmail.com)
use std::env;

// Private Static Variables
static FILES_DIR: &str = "/files/";
static FILES_PATH: &str ="/files";


// Accessors
pub async fn files_dir() -> Result<String, env::VarError> {
    Ok(env::var("TIDE_DIR")? + FILES_DIR)
}
pub async fn files_path(local: &str) -> String {
    if local == "/" {
        return String::from(FILES_PATH);
    } else {
        return String::from(FILES_PATH) + "/" + local;
    }
}

// ENV
pub async fn host() -> Result<String, env::VarError> {
    Ok(env::var("TIDE_ADDR")? + ":" + &(env::var("TIDE_PORT")?))
}
pub async fn path(local: &str) -> Result<String, env::VarError> {
    Ok(env::var("TIDE_DIR")? + "/" + local)
}
