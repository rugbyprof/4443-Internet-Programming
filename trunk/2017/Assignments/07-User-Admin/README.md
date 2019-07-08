## User Admin
#### Due: Nov 7<sup>st</sup> by classtime

This little project is all about the notorious "admin" panel. Nearly all websites display content. However, giving a user the ability to edit that content creates a lot complexity in the implementation. Even though it makes things complex, we still need to implement it. We are going to add a tiny bit of administrative ability by letting an administrator: 1) Add a user, 2) Delete a user, 3) Edit a user.

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
    - Edit user.
    - Add user.
    - Delete user.
- Recommended way of acheiving these is via the use of a pop up modal, with a confirmation modal for delete. If you feel like you can use jquery to edit or add users in a more interactively with "datatables" then go for it.
  

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


