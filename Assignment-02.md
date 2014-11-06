### Assignment 2 - Create your own server.
#### Due: August 31<sup>st</sup> by 2359 hours (1 minute before midnight).

-----

>Follow the steps below to create your own server. If these steps aren't clear enough, you can 
view an online tutorial [here](https://www.digitalocean.com/community/tutorials/how-to-create-your-first-digitalocean-droplet-virtual-server).

-----

#### 1. [Sign up](https://cloud.digitalocean.com/registrations/new) for Digital Ocean.

This will cost you around $5.00 + tax for the entire month. 

-----

#### 2. [Create a new Droplet](https://cloud.digitalocean.com/droplets/new)

- Droplet Hostname
> Pick a name for your computer. This is NOT a domain name that will be DNS resolvable.

- Select Size
> 512MB / 1 CPU<br>
20GB SSD DISK<br>
1TB TRANSFER<br>

- Select Region
> Pick the closest region to Texas.

- Select Image
> Ubuntu 14.04 x64

- Select Applications (Tab over from image)
> LAMP on Ubuntu 14.04

- Add optional SSH Keys
> Skip, we will address ssh keys later.

- Settings
> Leave default settings, and don't worry about backups (unless you want to pay).

-----

#### 3. IP Address & Password

- The IP address that is assigned to your "droplet", is your only connection to your server.
- The root password will be emailed to you.
- You need both IP address & password to access your new server.

#### 4. Accessing Your Server

- Open some type of "terminal" (like [putty](http://www.chiark.greenend.org.uk/~sgtatham/putty/download.html)) application and log into your server using:
    - The IP address given to you
    - The password emailed to you
- Change your root password!
    - Run the following command (note: the dollar `$` sign just implies "command line", don't use it in the command):
    - `$ passwd`
    - Follow the prompts.
- Add yourself as a user:
    - `$ adduser your-new-username`
    - Follow the prompts.
    - Stay root for now, but as soon as you add 'your-new-username' to `sudoers`, you should change to your new user:
    - `$ su your-new-username`
- Add me as a user:
    - `$ adduser griffin`
    - Set my password as `WebCourse2014!`, I will change it as necessary.
- Now we need to edit the `sudoers` file. `Sudoers` is a file that allows regular users to run commands as "root" as long as an entry is placed correctly in the file. 
- "Your-new-user" and "griffin" both need to be added:
    - A comprehensive tutorial about suders is available [Here](https://help.ubuntu.com/community/Sudoers).
    - Shortcut version:
        - (As root) $ nano /etc/suders
        - Edit sudoers and add two lines using the following example:

```txt
# User privilege specification
root	            ALL=(ALL:ALL) ALL

# Add yourself:
your-new-username 	ALL=(ALL:ALL) ALL

# Add me:
griffin 	        ALL=(ALL:ALL) ALL
```

#### 5. Basic necessary packages:

```bash
# update the package repositories
$ sudo apt-get update

# actually update any out of data packages
$ sudo apt-get upgrade

# install git a distributed version control system  
$ sudo apt-get install git

# install node.js a javascript framework that includes many addons we will use
$ sudo apt-get install node

# install node package manager
$ sudo apt-get install npm

# install unzip
$ sudo apt-get install unzip

```

#### 6. Testing Your Server

- Create a folder called `4443` in your `/var/www/html` directory
- Change in to your 4443 folder: `$ cd /var/www/html/4443`
- Run the following commands:

```bash
$ wget http://systempause.net/Template-ComingSoon.zip`
$ unzip Template-ComingSoon.zip
$ mv Template-ComingSoon mynewsite
```

- In a web browser, go to http://your.ip.address/4443/mynewsite
- If you see the countdown timer, then success!! 

- The directory structure of your webserver (up to this point) should be:
- ![1] 4443
    - ![1] mynewsite

#### 7. Send me your stuff

- In an email with the subject: "4443 IP Info"

>- Your Name
- Your github username
- The ip address of your new server
- My password (which is YOUR M number)




[1]: https://cdn1.iconfinder.com/data/icons/stilllife/24x24/filesystems/gnome-fs-directory.png
[2]: http://png-2.findicons.com/files/icons/2360/spirit20/20/file_php.png
[3]: http://www.lecollagiste.com/collanews/themes/lilina/web/media/folder.gif
[4]: http://rs.tudelft.nl/~rlindenbergh/publications/html.gif
[5]: https://cdn4.iconfinder.com/data/icons/spirit20/file-css.png
[6]: https://cdn4.iconfinder.com/data/icons/spirit20/file-js.png
