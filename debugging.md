## Debugging - What you can do to help
#### Due: NA

### Background

What you should know how to do up until now:

#### ssh

- You should be able to ssh into your server. 
  - `ssh user@your.ip.address`
- You should also be able to distingush the running commands locally on your dev machine, and running commands on the server.

#### ftp

- You should be able to upload files from your local environment onto your server and make sure they are in the correct location.
- You can do this using a plugin with `vscode` or using `filezilla`.

#### linux

- You should be able to traverse the file system and create new folders.
  - For example: `cd /var/www/html` 
  - Also: `mkdir assignment_0x`

- You should be able to edit permissions of files and change ownership.
  - `chmod +x filename.html` add execute for example.
  - `chown user:user filename.html` or `chown user:user html -R` to own all files in a folder.

#### Mysql

- You should be able to log into mysql either via command line or through phpmyadmin.
  - `mysql -u username -p` this will prompt you for your password on command line.
- You should be able to add a new mysql user via phpmyadmin and create a database for them.

#### Developer Console

- You should be able to look at your developer console and:
  - inspect the html code
  - look at errors in the actual console


If you cannot do all of the above items, then you will not be able to debug programs, or write any programs for that matter. If you have been avoiding any of these things I've listed (like logging in via ssh) you will struggle the rest of the class.
  
## Actual Debugging

Start by making sure your php scripts run without errors:

#### Check PHP file for errors:

- SSH into your server.
- Change to appropriate directory.
- Run `php filename.php` and look at output.
  - If it has no errors, good
  - If it does, fix them.

Check to see if your SQL statement has errors.

#### SQL errors

- Find the sql statement in your php file.
- If it requires data from the client page, then try logging it to a file when your front end requests the page.
- Create a file called `log.log` in your directory.
- Change write permissions: `chmod 777 log.log`
- Then write your sql to this file:

**Example:**

```php

// stuff

$sql = "INSERT INTO `users` (`fname`, `lname`, `email`, `city`, `age`, `state`) 
VALUES ('{$fname}', '{$lname}', '{$email}', '{$city}', '{$age}', '{$state}');";

logg($sql);

// stuff

function logg($stuff){
    file_put_contents('log.log',print_r($stuff,true));
}
```

- After you capture the sql statement in `log.log` then you can run it in phpmyadmin to get a good error message.


#### Uname and Passwords

- If you create a new mysql user for a project, test that you can log in via that user! If you can't, then your code won't be able to authenticate either!
- If you create a new linux user, make sure permissions for files allow them to be accessed via the browser!
