#!/bin/python
import sys, os, time
from colorama import Fore, Style
import sass

# compile sass source file to css target file
def sass_compile(src, target):
    try:
        target_file = open(target, "w")
    except:
        target_file = open(target, "x")
    print(Style.BRIGHT + "Sass: " + Style.RESET_ALL, end="")
    try:
        target_file.write(sass.compile(filename=src, output_style="compressed"))
    except Exception as e:
        print(Fore.RED + src + " -> " + target + Fore.RESET)
        print(e)
    else:
        print(src + " -> " + Fore.GREEN + target + Fore.RESET)
    target_file.close()

# sass files to compile
sass_files = {
    "src/sass/hub.scss": "files/css/general.css",
    "src/sass/dnd_hub.scss": "files/css/dnd.css",
    "src/sass/backend.scss": "files/css/backend.css",
    "src/sass/fin.scss": "files/css/fin.css",
}
# compile all files
for s in sass_files:
    sass_compile(s, sass_files[s])

# continue to watch for changes
if len(sys.argv) > 1 and sys.argv[1] == "watch":
        # find all sass source files
        sass_src = {}
        for s in sass_files:
            sass_src[s] = s
            src = open(s)
            for line in src.readlines():
                if line[0:9] == "@import \"":
                    new_src = "src/sass/_" + line[9:line.find("\"", 9)] + ".scss"
                    sass_src[new_src] = s
        # check modification times
        sass_times = {}
        for s in sass_src:
            sass_times[s] = os.stat(s).st_mtime

        while True:
            for s in sass_src:
                # check if modification time has changed
                mtime = os.stat(s).st_mtime
                if (mtime != sass_times[s]):
                    sass_compile(sass_src[s], sass_files[sass_src[s]])
                sass_times[s] = mtime
            time.sleep(0.2)
