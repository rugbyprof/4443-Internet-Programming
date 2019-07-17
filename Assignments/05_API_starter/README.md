## API Starter - Make it work!
#### Due: Thursday July 18<sup>th</sup> by 10:10

### Overview

You are going to take the [api.php](./api.php) file and the [form.html](./form.html) file that we created in class and make them talk. Don't put any of your files on github until we talk in class! You should never put passwords on github!

## Instructions

---

Using phpmyadmin ...

- **Create a database** called `website`

- **Create a table** called `users`

```sql
CREATE TABLE `users` (
  `fname` varchar(32) NOT NULL,
  `lname` varchar(32) NOT NULL,
  `email` varchar(128) NOT NULL,
  `city` varchar(64) NOT NULL,
  `age` int(3) NOT NULL,
  `state` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
```

- **Create a new mysql user** called `web_user` (and remember its password!)

---

With your editor:

- **Create a folder** called `assignment_05` and place in `/var/www/html`

- **Put both** the [api.php](./api.php) and the [form.html](./form.html) in the same folder for now.

- In your [api.php](./api.php) fix the following connection string to match your mysql credentials for your `web_user`

```php
$conn = mysqli_connect("localhost", "web_user", "web.users.password", "website");
```

- In the [form.html](./form.html) file, fix the following to point to your server:

```javascript
  $.post("http://your.ip.address/assignment_05/api.php", form_data)
      .done(function (data) {
          console.log(data);
      });
```

### Deliverables

- I should be able to go to `http://your.ip.address/assignment_05/form.html` on your server and submit to the `api.php` file in the same folder.
- I should see a successful response in the console.
- I should also see a new user in your database. 
