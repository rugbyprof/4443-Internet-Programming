## User Admin
#### Due: Oct 31<sup>st</sup> by classtime

This little project is all about the notorious "admin" panel. All websites display some content. Giving a user the ability to edit said content is a huge jump in the complexity of your site. We are going to add a tiny bit of this ability by letting a user: 1) Add a user, 2) Delete a user, 3) Edit a user.

#### Add / Edit
To `add` and `edit` a user you can use a modal form similar to the following:

![form](https://d3vv6lp55qjaqc.cloudfront.net/items/331k0k3s3w1910100v3p/form.png)

Or if you feel like you want to find a datatables plugin to help you edit the items. Don't get caught up doing
this if you don't have a strong understanding of whats going on. 

#### Delete

Simply delete the row from the table. However! you need to let the user confirm they want to delete!!

![](http://damien.antipa.at/wp-content/uploads/2011/10/jquery.popover.dialog.png)

### Requirements

- Using the existing code provided in this folder:
    - index.html
    - api.php
    - mongo_helper.php
- Add the following functionality to the existing data table:
    - Edit user via a modal form (at minimum).
    - Add user via a modal form (at minimum).
    - Ability to 

### Deliverables

- Create a folder called `useradmin` within your `Assignments` folder.
- Make sure all of your resources are downloaded to this folder.
- Use the following directory structure:
- Make sure this goes onto your DO server, so I can access it.
- Create a user called `griffin` on your server and send me a password on slack in a private message.
- I need at least read permissions on your `/var/www/html/useradmin` (which should be default).

```
/useradmin
    |
    /var/www/html/useradmin
    |-- index.html
    |
    |-- api.php
    |
    |-- mongo_helper.php
    |
    |-- css
    |    |-- bootstrap.min.css
    |    `-- some.main.css
    |-- js
    |    |-- bootstrap.min.js
    |    `-- jquery.min.js
    |
```


