## Assignment 6 - Using grid and stuff again
#### Due: Monday July 22<sup>nd</sup> by 10:10am

### Overview

Remember your grid assignment from before? Rinse and repeat. There is a sample dataset in the [card_services](./card_services) folder, that holds fake student information and "M" numbers. It is called [student_data.json](./card_services/student_data.json) and it holds 1000 students. There is also a folder that holds 1000 student images called [photos](./card_services/photos). 

[HERE](./helper_code.php) is some php code that reads a directory and a json file.

### Example

- Originally we did this:
<center><img src="http://cs.mwsu.edu/~griffin/zcloud/zcloud-files/color_card2.png"></center>

- Now I want to see this:

<center><img src="http://cs.mwsu.edu/~griffin/zcloud/zcloud-files/grid_student.png"></center>

### How?

You are going to have to add a route to your api that will return the json file of students. You don't need to return the images because the path to the image is stored for each student. 

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

Using this as an example, you can display thier image by using the `photo` value:

```html
<img src="http://your.ip.address/assignment_06/photos/21210523.jpg">
```

This should work as well:

```html
<img src="./photos/21210523.jpg">
```

### Api

I've included another version of our [api.php](./api.php). I should work with just a couple of changes to make sure files are in the correct location!

### Deliverables

- We will discuss putting your code on github Monday. I need to show you how to hide your passwords.
- Create a folder called `assignment_06`. This will be located at `/var/www/html` and in your github assignments folder.
- I should be able to see your grid creation by going to: `http://your.ip.address/assignment_06`
- Create a folder called `card_services_data` and place it inside your `assignment_06` folder. The json file and photo folder should be in this folder.
- Put the `api.php` in your `assignment_06` folder and make small corrections as needed. 
- Create an `index.html` file that will display each photo with student information in a grid like assignment_03.
- Remember to comment your code!  
