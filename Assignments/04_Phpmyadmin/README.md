## Assignment 04 - Install phpmyadmin
#### Due: Jul 17<sup>th</sup> by 10:10

### Background

We are starting to get the backend ready for requests from our webpages. There are many solutions on how to implement a "backend". One of the coolest is to use [Firebase](https://firebase.google.com/) which is an entire cloud based solution but has a steep initial learning curve. 

Using a linux server (Ubuntu in our case) has its merits. 
1. You are leaving the safety of Windows  
2. Linux is popular in our field
2. Command line interfaces are also poular in our field
3. Linux has many choices for web development

I chose to use a LAMP stack becuase of my familiarity with it. Notice that the acronym LAMP (Linux Apache Mysql Php) really is only backend :) Our frontends stay pretty much the same (`Javascript` `Html` `Css`) unless we choose a framework like [Angular](https://en.wikipedia.org/wiki/AngularJS) [React](https://en.wikipedia.org/wiki/React_(JavaScript_library)) or [Vue](https://en.wikipedia.org/wiki/Vue.js) which would change syntax of the frontend, but really nothing about the backend. Other choices could be (and there are many many many  more than I am listing):

1. Mongo - We could substitue Mysql ( our database ) for [MongoDB](https://en.wikipedia.org/wiki/MongoDB) (different kind of DB its a [NoSql DB](https://en.wikipedia.org/wiki/NoSQL))
2. [MEAN Stack](https://en.wikipedia.org/wiki/MEAN_(software_bundle)) - MongoDB (database), [Express.js](https://en.wikipedia.org/wiki/Express.js) (server), [AngularJS](https://en.wikipedia.org/wiki/AngularJS) (or Angular) (javascript framework), and [Node.js](https://en.wikipedia.org/wiki/Node.js) (backend scripting language)
2. [Python Django](https://en.wikipedia.org/wiki/Django_(web_framework))
3. [.NET](https://en.wikipedia.org/wiki/.NET_Framework) :) 

And many more "mix and match" solutions.

Again, I picked LAMP for our backend and vanilla Javascript Html Css for the front because you can move over to most other solutions and have a clue. Also, managing your own server is a huge deal. Doesn't mean you want to do it for a living, but understanding some server terminology, basic linux commands, and how to install software is also a big deal.

### Assignment

- Make sure Mysql is working. 
   - You should be able to type `mysql -u root -p` after you are logged in to your server, and enter root password (Digital Ocean stores default mysql root password here: `/root/.digitalocean_password`. It is not the same as your linux root password!)
   - [Install Howto](https://www.digitalocean.com/community/tutorials/how-to-install-the-latest-mysql-on-ubuntu-18-04) - Should not need.
   - [Basic Introduction](https://www.digitalocean.com/community/tutorials/a-basic-mysql-tutorial) - Might be helpful if you want to mess around with basic command line stuff.
- Install phpMyAdmin on your server. [HowTo](https://www.digitalocean.com/community/tutorials/how-to-install-and-secure-phpmyadmin-on-ubuntu-18-04) 
- Create a `griffin` user that has access to all the databases. Give me a password of `1HorseBlanketDonkeyBattery!`

### Deliverables

- I should be able to access phpmyadmin at `http://your.ip.address/phpmyadmin` and log in as griffin.
