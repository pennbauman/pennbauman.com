# dnd - pennbauman.com
#   URL: https://github.com/pennbauman/pennbauman.com
#   License: GPLv3.0
#   Author:
#     Penn Bauman (pennbauman@protonmail.com)
from flask import Blueprint, render_template, abort

dnd_app = Blueprint('dnd', __name__,
                        template_folder='templates')

# Unique pages
@dnd_app.route("/dnd")
def dnd():
    return render_template("dnd/index.html")

@dnd_app.route("/dnd/dice")
def dice():
    return render_template("dnd/dice.html")

@dnd_app.route("/dnd/stats")
def stats():
    return render_template("dnd/stats.html",
            stats = ["Str", "Dex", "Con", "Int", "Wis", "Cha"])

# Spell pages
@dnd_app.route("/dnd/spells")
def spell_index():
    return render_template("dnd/spells.html")
@dnd_app.route("/dnd/spells/<school>")
def spell_schools(school):
    try:
        return render_template("dnd/spells/" + school + ".html")
    except:
        abort(404)


# Monster pages
@dnd_app.route("/dnd/monsters")
def monster_index():
    return render_template("dnd/monsters.html")
@dnd_app.route("/dnd/monsters/<category>")
def monster_categories(category):
    try:
        return render_template("dnd/monsters/" + category + ".html")
    except:
        abort(404)
