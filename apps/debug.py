# apps/debug - pennbauman.com
#   URL: https://github.com/pennbauman/pennbauman.com
#   License: GPLv3.0
#   Author:
#     Penn Bauman (pennbauman@protonmail.com)
from flask import Blueprint, redirect, render_template, abort, flash
from data.accounts import User
from main import db, app


@app.route("/debug/new-user")
def new():
    db.create_all()
    new_user = "debug"
    try:
        if db.session.query(User).filter(User.username == new_user):
            db.session.query(User).filter(User.username == new_user).delete()
            db.session.commit()
    except sqlalchemy.exc.OperationalError:
        pass
    new = User(
        username = new_user,
        email = "debug@localhost.dev",
        display_name = "Debugger"
    )
    new.set_password("password")
    db.session.add(new)
    db.session.commit()
    return "done"
