## Assignment 7 - Dynamic Page Building 
#### Due: Monday July 29<sup>th</sup> by 10:10am

# NOT DONE!

### Overview

Add a search box to your main page that accepts a key word and searches the title of all candy products for a partial match. For example: `lemon` would find all titles with the keyword `lemon` in it: `lemonade` `lemon sours` `flavored hard candies (lemon)` etc. You don not have allow multiple words, although there are ways to make that happen as well.

```html
<!-- https://purecss.io/forms/ -->
<form class="pure-form">
    <input type="text" class="pure-input-rounded">
    <button type="submit" class="pure-button">Search</button>
</form>
```
<img src="./search_box_200.png" width="300">

Make sure you always limit your searches to no more than about 25 results. You can even allow a user to choose how many they would like displayed if you want. We can talk about "remember my choice next week".

```html
<form class="pure-form">
    <fieldset>
        <legend>A Inline Form</legend>
        <div class="pure-g">
            <div class="pure-u-1 pure-u-md-1-4">

                <label for="resultCount">Result Size:</label>
                <select id="resultCount">
                    <option>10</option>
                    <option>25</option>
                    <option>50</option>
                </select>
            </div>
            <div class="pure-u-1 pure-u-md-1-4">
                <input type="text" class="pure-input-rounded">
                
            </div>
            <div class="pure-u-1 pure-u-md-1-4">
                    <button type="submit" class="pure-button">Search</button>
            </div>
            <div class="pure-u-1 pure-u-md-1-4">
                <label for="remember" class="pure-checkbox">
                    <input id="remember" type="checkbox"> Remember my choice
                </label>
            </div>

    </fieldset>
</form>
```

<img src="./inline_form_600.jpg">

### Files and DB

- Create a folder in your web root (/var/www/html/) called `candy_store`.
- Images are here: https://profgriffin.com/candy_store/images.zip
- From your terminal, after you log into your server, run: `wget https://profgriffin.com/candy_store/images.zip`
- The database sql to create and load your table is here: https://profgriffin.com/candy_store/candy.sql
- From the command line you can run `mysql -u username -p database_name < candy.sql` to import a sql file. 
  - Replace `username` with your mysql username and `database_name` with your database name. The `-p` means "prompt for my password"


### Api

- Grap the API from here: https://profgriffin.com/candy_store/api.zip
- Unzip it in your `candy_store` folder.
- Change the credentials for your mysql user.

### Up To Now

You should have a file structure like:

```
-> var
    -> www
        -> html
            -> candy_store
                -> api
                    -> classApi.php
                    -> classCandyApi.php
                    -> ...
                -> images
                    -> lots of images
                    -> ...
                -> index.html
```


### Usage

- All these routes work on my server. 
- After you install everything they should work on your server as well.
- Replace `profgriffin.com` with `your.ip.address`

  - https://profgriffin.com/candy_store/api?route=candy&keyword=mints&column=category&start=50&chunk=10
  - https://profgriffin.com/candy_store/api?route=candy&keyword=lemon&column=title&matchtype=wildcard
  - https://profgriffin.com/candy_store/api?route=candy&max=3.99&column=price
  - https://profgriffin.com/candy_store/api?route=candy&min=14.99&column=price&start=10&chunk=10&max=44.99

**example request**
```js
$.get("https://profgriffin.com/candy_store/api?route=candy&max=3.99&column=price&start=0&limit=10", form_data)
    .done(function (data) {
        console.log(data);
    });
```


```js
$.get("http://your.ip.address/assignment/api.php?route=student")
        .done(function (data) {
            console.log(data);
            // Use the response to add each student to the DOM
        });
```

- Your `index.html` needs data so display. It requests the data using a `.get` request from `api.php`
- Your `api.php` responds to a route called: `student` by opening the `card_services/student_data.json` file and sending it back as a response to `index.html`
- `index.html` takes the response and loops through the json array adding each students information to the DOM and organizing the layout using `css grid`. 


### Deliverables

**NOTE!!!** - This is NOT a cut and paste assignment. Its close, but you will have to make sure links and such point to correct locations by changing some of the paths (like for images for example).

- We will discuss putting your code on github Monday. I need to show you how to hide your passwords.
- Create a folder called `assignment_06`. This will be located at `/var/www/html`.
- I should be able to see your grid creation by going to: `http://your.ip.address/assignment_06`
- Create a folder called `card_services_data` and place it inside your `assignment_06` folder. The json file and photo folder should be in this folder.
- Put the `api.php` in your `assignment_06` folder and make small corrections as needed. 
- Create an `index.html` file that will display each photo with student information in a grid like assignment_03.
- Remember to comment your code!  
- And remember everything will end up on Github eventually.
