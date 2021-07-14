// pennbauman.com
//   URL: https://github.com/pennbauman/pennbauman.com
//   License: GPLv3.0
//   Author:
//     Penn Bauman (me@pennbauman.com)
use std::fs::File;
use std::io::Write;
use sass_rs::{Options, compile_file};

fn main() {
    // SASS: sass/general.scss -> files/css/general.css
    println!("cargo:rerun-if-changed=sass/general.scss");
    match compile_file("sass/general.scss", Options::default()) {
        Ok(s) => {
            let mut f = File::create("files/css/general.css").expect("open failed");
            f.write_all(s.as_bytes()).expect("write failed");
        },
        Err(s) => println!("cargo:warning=Sass: {}", s),
    };
}
