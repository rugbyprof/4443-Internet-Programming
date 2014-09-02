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


```

#### 6. Testing Your Server

- Navigate to `/var/www/`
- `$ cd /var/www`

- If a folder called `html` exists, change into the `html` folder, otherwise stay in `www'

- Run `$ wget http://198.199.107.73/Template-ComingSoon.zip`
- In a web browser, go to http://your.ip.address/
- If you see the countdown timer, then success!! 

#### 7. Send me your stuff

In an email with the subject: "4443 IP Info"

Send me the following:
- Ip Address
- Github username

