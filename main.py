# pennbauman.com
#   URL: https://github.com/pennbauman/pennbauman.com
#   License: GPLv3.0
#   Author:
#     Penn Bauman (pennbauman@protonmail.com)
from flask import Flask, render_template, redirect, url_for

app = Flask(__name__, static_url_path="/files", static_folder="files")
application = app

# Core Pages
@app.route("/")
def index():
    return render_template("core/index.html")

@app.route("/about")
def about():
    return render_template("core/about.html", about="About - Penn Bauman",
            description="Penn Bauman is currently attening The University of Virginia. He is majoring Computer Science in the School of Engineering, and minoring in Physics.")

@app.route("/site")
def site():
    return render_template("core/site.html", about="Site - Penn Bauman",
            description="Site information for pennbauman.com")

@app.route("/resume")
def resume():
    return redirect(url_for('static', filename="Penn_Bauman_Resume.pdf"))
@app.route("/github")
def github():
    return redirect("http://github.com/pennbauman")
