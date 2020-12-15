#!/bin/sh

source $(pwd)/env/bin/activate

export FLASK_APP=main.py
export SQLALCHEMY_DATABASE_URI=sqlite:///$(pwd)/db.sqlite3

if [[ $1 =~ ^dev ]]; then
	export SECRET_KEY=9DCBcNO63LrcIxA46kvHfw
	export FLASK_ENV=development
fi
