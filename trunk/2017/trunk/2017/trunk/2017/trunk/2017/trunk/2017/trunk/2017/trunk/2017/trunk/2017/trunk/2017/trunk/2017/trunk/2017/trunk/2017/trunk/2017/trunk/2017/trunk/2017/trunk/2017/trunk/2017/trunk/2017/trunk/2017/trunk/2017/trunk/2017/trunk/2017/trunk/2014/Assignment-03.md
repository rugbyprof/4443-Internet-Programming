## Assignment 3 - First Web Page

#### Due Sep 3<sup>rd</sup> by 12:00 p.m.
- Create a folder called "Portal" in `/var/www/html/4443/`
- Go to your `/var/www/html/4443/Portal` directory, and run the following commands:

```bash
$ wget http://startbootstrap.com/downloads/simple-sidebar.zip
$ unzip simple-sidebar.zip
$ rm simple-sidebar.zip
```

- Once you've unzipped `simple-sidebar.zip`, you will have a `simple-sidebar` folder. We want to move the contents of `simple-sidebar` back one directory:

```
$ cd simple-sidebar
$ mv * ..
$ rm -rf simple-sidebar
```

The commands above do the following:

1. change into the simple-sidebar directory
2. move all the files and folders back into the portal folder (or up one directory)
3. delete the NOW empty folder: simple-sidebar

Your new directory structure (up till now) should look like:
- ![1] 4443
    - ![1] mynewsite
    - ![1] Portal


### Make the following changes:

- Change the text "Start Bootstrap" in the sidebar to "Assignment Portal"
- Change the text "Simple Sidebar" in the body to "Your Name's Assignment Portal"


[1]: https://cdn1.iconfinder.com/data/icons/stilllife/24x24/filesystems/gnome-fs-directory.png
[2]: http://png-2.findicons.com/files/icons/2360/spirit20/20/file_php.png
[3]: http://www.lecollagiste.com/collanews/themes/lilina/web/media/folder.gif
[4]: http://rs.tudelft.nl/~rlindenbergh/publications/html.gif
[5]: https://cdn4.iconfinder.com/data/icons/spirit20/file-css.png
[6]: https://cdn4.iconfinder.com/data/icons/spirit20/file-js.png
