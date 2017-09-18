Vagrant
=======

### Due: Tuesday September 5<sup>th</sup> by class time.

This assignment is meant to help you create a local dev environment. It really should be part of the 1<sup>st</sup> assignment, but I wasn't sure what method we would use to "serve" our pages. I think vagrant is a good choice for its ease of setup AND removal. 

### Windows
Windows users will need to install a few things by hand. If someone finds an "all in one" installer feel free to 

- Install 
    - [Virtual Box](https://www.virtualbox.org/wiki/Downloads)
    - [Vagrant](https://www.vagrantup.com/downloads.html)
    - [Putty](http://www.chiark.greenend.org.uk/~sgtatham/putty/download.html)
    - [Git Bash](https://git-scm.com/downloads)
 
 
 #### Chocolatey
 
 Chocolatey is a windows package manager that lets you install packages from the command line with relative ease. Create a file called 'install_all.bat' and place the following lines in it:
 
 ```sh
 choco install virtualbox
 choco install vagrant
 choco install putty
 choco install git
 choco install ngrok.portable
 ```
 
 Then from a command prompt (in the same directory) just type: `install_all`
 
### Not Windows

- Install
    - [Vagrant](https://www.vagrantup.com/downloads.html)
    - Ngrok
    
    
### In class lecture 

Were simply going to go over Vagrants actual setup guide, with a little extra explanation from me:

https://www.vagrantup.com/intro/getting-started/install.html


### Your Assignment

Your assignment will be to create a [Vagrant Share](https://www.vagrantup.com/intro/getting-started/share.html) which will allow someone to access your vagrant virtual machine. RELAX! You won't have to keep your VM up and running at all times just so I can access it, however, you will need to keep it up and running for a short period of time. This small time window will be provided to me so I can test the connection.


### Deliverables

- Create a file called: `vagrant.md` and put in a folder called `assignments` in your github repo.
- In this vagrant.md file, place the following information:

```
Your Name
Date

Times your vagrant share will be available.
Url provided by vagrant share.

```





