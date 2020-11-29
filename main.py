from flask import Flask, render_template, redirect, url_for

app = Flask(__name__, static_url_path="/files", static_folder="files")

# Core Pages
@app.route("/")
def index():
    return render_template("index.html")
@app.route("/about")
def about():
    return render_template("about.html", about="About - Penn Bauman",
            description="Penn Bauman is currently attening The University of Virginia. He is majoring Computer Science in the School of Engineering, and minoring in Physics.")
@app.route("/site")
def site():
    return render_template("site.html", about="Site - Penn Bauman", description="")

# Redirects
@app.route("/github")
def github():
    return redirect("http://github.com/pennbauman")
@app.route("/resume")
def resume():
    return redirect(url_for("static", filename="Penn_Bauman_Resume.pdf"))
