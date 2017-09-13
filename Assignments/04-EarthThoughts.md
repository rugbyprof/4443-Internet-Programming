## Earth Thoughts
#### Due: Thursday Sep 14<sup>th</sup> by classtime

### Goal: 
- Use boostrap to help us style our front end 
- Use a crude API to send resources to our front end

### Tools:
- Python Flask
- Bootstrap css framework
- Html
- Javascript (jquery)

### Overview

Given the bootstrap jumbotron styled web page, and the mini crude API the we wrote in Flask, add two 
The following two json files should be present on the vagrant box that I saved for you. 

showerthoughts.json
earthporn.json

#### EarthPorn Example
https://i.redd.it/fsipwrv7fgkz.jpg


#### Get Bootstrap
- http://getbootstrap.com/
- http://getbootstrap.com/docs/4.0/examples/narrow-jumbotron/

#### Jumbotron Background Image
https://stackoverflow.com/questions/40731694/bootstrap-3-jumbotron-background-image


### Requirements

- Please name your items exactly as I do.
- Create a folder called `Assignments` in your github repo. 
- Create a folder called `earththoughts` within your `Assignments` folder.
- Within you `earththoughts` folder you should have a file called `index.html` that contains your Earththoughts site code.
- Also within the `earththoughts` folder create two folders: `css` and `js`.
- Download all of your off server resources and place them in the appropriate folder.
    - Example:
        - Given the following: `<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css">`
        - Simply run the command: `wget https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css`
        - Then move it into to css folder
        - Or add `-O css/bootstrap.min.css` to the end of your command to download and mv in the same go.
- Basically have a nice self contained folder with all dependancies downloaded and placed in a folder structure similar to below. I say `similar` because your `scripts` folder my be somewhere else on your vagrant box, but it needs to be uploaded with your front end code. 
```
Server Setup
------------

/earththoughts
    |
    /var/www/html/earththoughts
    |-- index.html
    |
    |-- css
    |    |-- bootstrap.min.css
    |    `-- jumbotron-narrow.css
    |-- js
    |    |-- bootstrap.min.js
    |    `-- jquery.min.js
    |
/scripts
    |--app.py
```

### Deliverables

- A page that displays an `earthporn` image along with a `showerthoughts` quote superimposed over the image.
- Try and make the image as large as you can.
- Remove any extraneous tags / code from above and below your image/quote
- There should be a button in close proximity to your image to allow a user to get another image. 
- An example of a layout is below:

![](https://d3vv6lp55qjaqc.cloudfront.net/items/00403s1K2k1H0A060U1G/earththoughts.png?X-CloudApp-Visitor-Id=1094421)
