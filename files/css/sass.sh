#!/bin/sh
# requires dart-sass
if [[ $1 == back ]]; then
	echo "backend.css"
	sass backend.scss backend.css --no-source-map --watch
elif [[ $1 == "dice" ]]; then
	echo "dice.css"
	sass dice.scss dice.css --no-source-map --watch
elif [[ $1 == "stats" ]]; then
	echo "stats.css"
	sass stats.scss stats.css --no-source-map --watch
else
	echo "general.css"
	sass hub.scss general.css --no-source-map --watch
fi
