

all-css: css

tmp/dart-sass/sass:
	curl -L https://github.com/sass/dart-sass/releases/download/1.30.0/dart-sass-1.30.0-linux-x64.tar.gz -o tmp/sass.tar.gz
	tar xzf tmp/sass.tar.gz -C tmp

css: tmp/dart-sass/sass src/sass/hub.scss
	./tmp/dart-sass/sass src/sass/hub.scss files/css/general.css --no-source-map --style=compressed


