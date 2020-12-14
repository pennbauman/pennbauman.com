#!/bin/sh

source env/bin/activate

export FLASK_APP=main.py

if [[ $1 =~ ^dev ]]; then
	export FLASK_ENV=development
fi
