#!/bin/sh
# requires dart-sass
if [[ $1 == back ]]; then
	echo "backend.css"
	sass backend.scss backend.css --no-source-map --watch --style=compressed
elif [[ $1 == "fin" ]]; then
	echo "fin.css"
	sass fin.scss fin.css --no-source-map --watch --style=compressed
elif [[ $1 == "dnd" ]]; then
	echo "dnd.css"
	sass dnd_hub.scss dnd.css --no-source-map --watch --style=compressed
else
	echo "general.css"
	sass hub.scss general.css --no-source-map --watch --style=compressed
fi
