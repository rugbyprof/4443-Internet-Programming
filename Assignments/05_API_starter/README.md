## API Starter - Make it work!
#### Due: Thursday July 18<sup>th</sup> by 10:10

### Overview

You are going to take the [api.php](./api.php) file and the [form.html](./form.html) file that we created in class and make them talk. 

## Instructions

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

- **Create a new mysql user** called `web_user`




### Deliverables
