#!/bin/python
import sys, os, time
from colorama import Fore, Style
import sass
from markdown import markdown

def path(local):
    return os.path.dirname(__file__) + "/" + local
def crate(path):
    return os.path.dirname(__file__) + "/../" + path

# compile dnd md to html
def dnd_md_compile(src, target):
    #print(Style.BRIGHT + "MD: " + Style.RESET_ALL, end="")
    #print(src + " -> " + Fore.GREEN + target + Fore.RESET)
    src_md = open(src)
    try:
        md_target = open(target, "w")
    except:
        md_target = open(target, "x")
    md_target.write("{% extends 'dnd/page.html' %}\n")

    # parse title from metadata
    src_text = ""
    title = ""
    meta = 0
    for line in src_md.readlines():
        # check entry and exit of metadata section
        if line[0:3] == "---":
            if meta == 0:
                meta = 1
            else:
                meta = 2
        else:
            # add title block
            if meta == 1:
                if line[0:6] == "title:":
                    md_target.write("{% block title %}" + line[6:-1] + "{% endblock %}\n")
            elif meta == 2:
                src_text += line

    # compile actual markdown
    md_target.write("{% block content %}\n")
    md_target.write(markdown(src_text))
    md_target.write("\n{% endblock %}")
    md_target.close()

# compile markdown for dnd pages
try:
    os.makedirs(crate("templates/dnd/spells"))
except:
    pass
try:
    os.makedirs(crate("templates/dnd/monsters"))
except:
    pass

for f in os.listdir(path("src/md/dnd")):
    dnd_md_compile(path("src/md/dnd/" + f), crate("templates/dnd/" + f[0:-3].replace("_", "/") + ".html"))

print(Style.BRIGHT + "DND.md: " + Style.RESET_ALL + "src/md/dnd/* -> " + Fore.GREEN + "templates/dnd/*" + Fore.RESET)
print()



# compile sass source file to css target file
def sass_compile(src, target):
    try:
        target_file = open(crate(target), "w")
    except:
        target_file = open(crate(target), "x")
    print(Style.BRIGHT + "Sass: " + Style.RESET_ALL, end="")
    try:
        target_file.write(sass.compile(filename=path(src), output_style="compressed"))
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
                    new_src = path("src/sass/_" + line[9:line.find("\"", 9)] + ".scss")
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
