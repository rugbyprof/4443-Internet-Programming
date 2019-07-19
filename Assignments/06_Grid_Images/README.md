## Assignment 6 - Using grid and stuff again
#### Due: Monday July 22<sup>nd</sup> by 10:10am

### Overview

Remember your grid assignment from before? Rinse and repeat. There is a sample dataset in the [card_services](./card_services) folder, that holds fake student information and "M" numbers. It is called [student_data.json](./card_services/student_data.json) and it holds 1000 students. There is also a folder that holds 1000 student images called [photos](./card_services/photos). 


### Example

- Originally we did this:
<center><img src="http://cs.mwsu.edu/~griffin/zcloud/zcloud-files/color_card2.png"></center>

- Now I want to see this:

<center><img src="http://cs.mwsu.edu/~griffin/zcloud/zcloud-files/grid_student.png"></center>

### How To

I gave you a cleaned up API that has the necessary route to return the student json. You WILL HAVE TO FIX PATHS to make it work. Below is an example student. Notice the `photo` key value pair? That provides a path to that students photo. 

Example Student:

```json
    {
        "mustang_id": 21210523,
        "first_name": "Timmie",
        "middle_initial": "R",
        "last_name": "Rubenczyk",
        "classification": "Student",
        "photo": "/photos/21210523.jpg"
    }
```

We can use that information to build a URL to display thier image by using the `photo` path:

```html
<!-- Append path to end of your servers address and assignment folder -->
<!-- This is an absolute path -->
<img src="http://your.ip.address/assignment_06/photos/21210523.jpg">
```

This should work as well:

```html
<!-- This is a relative path which should work if your index.html is in the same folder as the photos folder. -->
<img src="./photos/21210523.jpg">
```

### Api

- I've included another version of our [api.php](./api.php). It should work with just a couple of changes. 
- Make sure you pay attention to directory structure (so your paths will be correct).

### Summary

**example request**
```js
    var form_data = {
        'route':'register',
        'first-name': $('#first-name').val(),
        'last-name': $('#last-name').val(),
        'email': $('#email').val(),
        'city': $('#city').val(),
        'age': $('#age').val(),
        'state': $('#state').val()
    }

    $.post("http://your.ip.address/assignment/api.php", form_data)
        .done(function (data) {
            console.log(data);
        });
```
- But this is sending data to the server to create new content. A more appropriate way is to use a `GET` request which reguires NO data to be sent (you could if you wanted to, but in this case not necessary). 
- If we don't send back data, how do we tell the api which route we want? GET params on the URL!

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
