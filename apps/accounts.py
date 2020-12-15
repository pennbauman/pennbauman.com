# apps/accounts - pennbauman.com
#   URL: https://github.com/pennbauman/pennbauman.com
#   License: GPLv3.0
#   Author:
#     Penn Bauman (pennbauman@protonmail.com)
from flask import Blueprint, redirect, render_template, abort, url_for, flash
from flask_login import LoginManager, login_required, logout_user, current_user, login_user
from data.accounts import User
from main import db

accounts_app = Blueprint("accounts", __name__, template_folder="templates")

# specailized account functions
login_manager = LoginManager()
from main import app
login_manager.init_app(app)

@login_manager.user_loader
def load_user(user_id):
    if user_id is not None:
        return User.query.get(user_id)
    return None

@login_manager.unauthorized_handler
def unauthorized():
    abort(401)


# Pages
@accounts_app.route("/account")
def account():
    if current_user.is_authenticated:
        return render_template("accounts/index.html", user = current_user)
    else:
        return redirect(url_for("accounts.login"))

@accounts_app.route("/account/login", methods=['GET', 'POST'])
def login():
    # check if user already logged in
    if current_user.is_authenticated:
        return redirect(url_for("accounts.account"))

    error_msg = None
    form = LoginForm()
    # validate form
    if form.validate_on_submit():
        user = User.query.filter_by(username = form.username.data).first()
        if user and user.check_password(password = form.password.data):
            # login
            login_user(user)
            return redirect(url_for("accounts.account"))
        error_msg = "incorrect login"

    return render_template(
        "accounts/login.html",
        form = form,
        error = error_msg
    )

@accounts_app.route("/account/logout")
def logout():
    if current_user.is_authenticated:
        logout_user()
    return redirect(url_for("accounts.login"))



# Login form
from flask_wtf import FlaskForm
from wtforms import StringField, PasswordField, SubmitField
from wtforms.validators import DataRequired, Email, EqualTo, Length, Optional

class LoginForm(FlaskForm):
    username = StringField("Username", validators = [DataRequired()])
    password = PasswordField("Password", validators = [DataRequired()])
    submit = SubmitField("Login")
