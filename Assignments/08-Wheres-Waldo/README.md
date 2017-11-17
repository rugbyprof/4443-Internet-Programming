## Where's Waldo
#### Part 1 Due: Nov 14<sup>th</sup>
#### Part 2 Due: Nov 21<sup>st</sup>
#### Part 3 Due: Nov 30<sup>th</sup> 


#### General Directory Structure
```
/var/www/html/whereswaldo1
/-- api
|    | 
|    `-- api.php
/-- css
/-- game_images
/-- js
/-- scripts
|    |-- mongo_helper.php
|    `-- image_helper.php
/-- waldo_images
|-- index.html
|
```
---

## Part 1

### Requirements
- ***`/var/www/html/whereswaldo1`***
- Game clock timer
- Example: https://codepen.io/_Billy_Brown/pen/dbJeh
- Example: http://jsbin.com/gist/4372563?js,output

- Add a javascript game timer somewhere on the page, style is up to you however it must include `tenths` of a second.
- Blur the image so the player can't start early.
- Turn one of the menu links into a `start` game link.
- The timer will start when the game starts and the image will become clear.

```js
function blur(elem,x){
    var filterVal = 'blur('+x+'px)';

        elem.css('filter', filterVal)
        .css('webkitFilter', filterVal)
        .css('mozFilter', filterVal)
        .css('oFilter', filterVal)
        .css('msFilter', filterVal);
}
```

### Deliverables

- I should be able to see your code running on your `do` server at http://your.ip.address/whereswaldo1
- The appropriate directory structure is same as above
- Place a copy (without images) in your `assignments` folder on github.

---

## Part 2


### Requirements

- ***`/var/www/html/whereswaldo2`***
- Your mongo database name will be `waldogame`
- The collection for this will be `users`
- Add a route to the `api` that receives `x,y` coordinates of a mouse click, and returns:
    - distance from waldo
    - ~~direction to waldo ~~
    - ~~coordinates for a hint "rectangle"~~
- ~~Add a `register_user` route to the `api` to register a user. ~~
    - ~~Create a `user` collection~~
    - ~~Users will have the following information:~~
        - ~~username~~
        - ~~email~~
        - ~~password~~
    - ~~Store the time the user registered as a unix timestamp.~~
- Add a `games` collection to your `waldogame` database.
- Game route to be discussed in class

### Deliverables

- I should be able to see your code running on your `do` server at http://your.ip.address/whereswaldo2
- The appropriate directory structure is same as above
- Place a copy (without images) in your `assignments` folder on github.

---

## ~~Part 3~~

### ~~Requirements~~

- ~~***`/var/www/html/whereswaldo3`***~~
- ~~User registration and management ... ~~

### ~~Deliverables~~

~~TBD~~






