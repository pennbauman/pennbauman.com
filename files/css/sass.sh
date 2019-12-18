#!/bin/sh
# requires dart-sass
if [[ $1 == back ]]; then
	echo "backend.css"
	sass backend.scss backend.css --no-source-map
else
	echo "general.css"
	sass hub.scss general.css --no-source-map --watch
fi
