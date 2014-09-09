## Assignment 3 - First Web Page

#### Due Sep 3<sup>rd</sup> by 12:00 p.m.

- Create a folder called "Portal" in `/var/www/html`
- Go to your `/var/www/html/Portal` directory, and run the following commands:

```bash
$ wget http://startbootstrap.com/downloads/simple-sidebar.zip
$ unzip simple-sidebar.zip
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

### Make the following changes:

- Change the text "Start Bootstrap" in the sidebar to "Assignment Portal"
- Change the text "Simple Sidebar" in the body to "Your Name's Assignment Portal"



