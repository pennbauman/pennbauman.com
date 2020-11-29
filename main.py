from flask import Flask, render_template

app = Flask(__name__, static_url_path="/files", static_folder="files")

# Main Pages
@app.route('/')
def index():
    return render_template("index.html")
