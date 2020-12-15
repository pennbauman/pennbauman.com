# pennbauman.com
#   URL: https://github.com/pennbauman/pennbauman.com
#   License: GPLv3.0
#   Author:
#     Penn Bauman (pennbauman@protonmail.com)
from flask import Flask, render_template, redirect, request, url_for
from os import environ, path
from werkzeug.exceptions import HTTPException
from flask_sqlalchemy import SQLAlchemy

BASE_DIR = path.abspath(path.dirname(__file__))

app = Flask(__name__, static_url_path="/files", static_folder="files")
app.config.update(
    SECRET_KEY = environ.get('SECRET_KEY'),
    FLASK_APP = environ.get('FLASK_APP'),
    FLASK_ENV = environ.get('FLASK_ENV'),
    # database
    SQLALCHEMY_DATABASE_URI = environ.get('SQLALCHEMY_DATABASE_URI'),
    SQLALCHEMY_ECHO = False,
    SQLALCHEMY_TRACK_MODIFICATIONS = False
)
application = app

# database
db = SQLAlchemy()
db.init_app(app)
with app.app_context():
    db.create_all()



# accounts
from apps.accounts import accounts_app
app.register_blueprint(accounts_app)
# dnd
from apps.dnd import dnd_app
app.register_blueprint(dnd_app)
# test
from apps.test import test_app
app.register_blueprint(test_app)

# debug only pages
if app.config['FLASK_ENV'] == "development":
    import apps.debug



# Remove trailing slashes
@app.before_request
def remove_trailing():
    if request.path != "/" and request.path[-1:] == "/":
        return redirect(request.path[:-1])


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


# Error Pages
@app.errorhandler(HTTPException)
def error(e):
    return render_template('error.html',
            code = e.code,
            name = e.name,
            desc = e.description,
        ), e.code
