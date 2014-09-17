## Assignment 5 - Creating your database.

### Due Sep 24<sup>th</sup> by 12:00 p.m.


### Step 1 - Get root password

You need to obtain your root password for mysql. If you haven't changed it, then
you should see it right after you log in. If you have changed it, well you can
probably skip a few steps.

![](http://f.cl.ly/items/3y2S3N2j220u1l2U0X1n/ScreenShot.png)

Write it down, or copy paste it somewhere.

### Step 2 - Change root password

Change your mysql root password. This will make it easier to do the next few steps. The easiest way to do this (the only way as of right now) is to do the following:

```
root@MachineName:~# mysql -u root -p
Enter password: (type or paste your password here)
```

After you authenticate. You should see:

```
Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

mysql>
```

- Then run the following SQL command to actually do the password change. 
- Please change `MyNewPass` to YOUR password.

```sql
UPDATE mysql.user SET Password=PASSWORD('MyNewPass') WHERE User='root';
FLUSH PRIVILEGES;
```

Just type `exit` to get out of mysql command line interface.

### Step 3 - Install Phpmyadmin
