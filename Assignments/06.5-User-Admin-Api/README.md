## User Admin
#### Due: Oct 31<sup>st</sup> by classtime

Before the admin panel (see assignment 7), we need to fix the api. As I said were not using RESTful best practices 
(see [HERE](https://hackernoon.com/restful-api-designing-guidelines-the-best-practices-60e1d954e7c9)), thats for 
another day. Right now, we have this setup:

```php
    /**
     *All things user.
     */
    protected function user()
    {
        // does EVERYTHING for users
    }
```

What I would like:

```php
    /**
     *  @name: add_user
     *  @description: adds a new user(s) to the collection
     *  @type: POST
     *
     *  The posted data will be an json array of 1 - N new users.
     *  Example:
     *  { 
     *     TBD in class
     *  }
     */
    protected function add_user()
    {
    }

    /**
     *  @name: add_user
     *  @description: adds a new user(s) to the collection
     *  @type: PUT
     *
     *  The posted data will be an json array of 1 - N arrays of key value pairs.
     *  E.g.  
     *  Example:
     *  { 
     *     TBD in class
     *  }
     */
    protected function update_user()
    {
    }

    /**
     *  @name: delete_user
     *  @description: deletes a user(s) from the collection
     *  @type: DELETE
     *  E.g.  
     *  Example:
     *  { 
     *     TBD in class
     *  }
     */
    protected function delete_user()
    {
    }

    /**
     *
     *  @name: find_user:
     *  @description: finds a user(s) in the collection
     *  @type: GET
     *  E.g.  
     *  Example:
     *  { 
     *     TBD in class
     *  }
     */
    protected function find_user()
    {
    }
    
    /**
     *  @name: random_user:
     *  @description: retreives a random user(s) from the randomuser api
     *  @type: GET
     *  This will also filter the data so that only the values we need are in the collection, and all top level keys with no nesting.
     *  E.g.  
     *  Example:
     *  { 
     *     TBD in class
     *  }
     */
    protected function random_user()
    {
    }
    
```


### Requirements
  - curl commands

### Deliverables

- Create a folder called `useradmin-api` within your `Assignments` folder.
- Make sure all of your resources are downloaded to this folder.
- Use the following directory structure:
- Make sure this goes onto your DO server, so I can access it.
- Create a user called `griffin` on your server and send me a password on slack in a private message.
- I need at least read permissions on your `/var/www/html/useradmin-api` (which should be default).

```
/useradmin-api
    |
    /var/www/html/useradmin
    |-- api.php
    |
```


