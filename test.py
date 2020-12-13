# test - pennbauman.com
#   URL: https://github.com/pennbauman/pennbauman.com
#   License: GPLv3.0
#   Author:
#     Penn Bauman (pennbauman@protonmail.com)
from flask import Blueprint, render_template

test_app = Blueprint('test', __name__,
                        template_folder='templates')

@test_app.route("/test")
def test():
    return render_template("test/index.html")

@test_app.route("/test/size")
def size():
    return render_template("test/size.html")

@test_app.route("/test/color")
def color():
    return render_template("test/color.html")

@test_app.route("/test/favicon")
def favicon():
    return render_template("test/favicon.html")

@test_app.route("/test/junk")
def junk():
    return render_template("test/junk.html",
            data={
                "testing": "dict"
            }
        )
