## Program 4 Checklist

This will be graded by viewing the page in a browser and checking that the contents
come from the api. 

| :hash:   | Item                                              | Possible | Earned |
|-----|---------------------------------------------------|----------|--------|
| :one: | Path and naming requirements followed.       | 20       |        |
| :two: | Earthporn image displays.                     | 10       |        |
| :three: | Showerthoughts quote displays.                | 10       |        |
| :four: | Quote superimposed over image.                | 10       |        |
| :five: | Image retreived from api.                     | 15       |        |
| :six: | Quote retreived from api.                     | 15       |        |
| :seven: | Button to "get another" exists and functions. | 20       |        |
| :eight: | Total Points:                                 | 100       |        |

## Program 5 Checklist

Test using postman is fine

#### Part 1:

| :hash:   | Item                                                   | Possible | Earned |
|-----|--------------------------------------------------------|----------|--------|
| :one: | Path and naming requirements followed.            | 25       |        |
| :two: | `meme/new` route runs without error                | 25       |        |
| :three: | A "document" is created and saved in a collection | 25       |        |
| :four: | The document contains a unique integer id         | 25       |        |
| :five: | Total:                                             | 100       |        |

Test using browser and form submission

### Part 2:
| :hash:   | Item                                                       | Possible | Earned |
|-----|------------------------------------------------------------|----------|--------|
| :one: |  Path and naming requirements followed.                | 15       |        |
| :two: | `user/new` route runs without error                    | 25       |        |
| :three: |  A modal form displays on button click on index page   | 10       |        |
| :four: |  Form contains appropriate fields                      | 10       |        |
| :five: |  Submitting the form results in new doc in collection. | 15       |        |
| :six: |  Each new user obtains an appropriate unique int id.   | 15       |        |
| :seven: |  Password is hashed                                    | 10       |        |
| :eight: | Total:                                                 | 100      |        |

## Program 6 Checklist

| #   | Item                                | Possible | Earned |
|-----|-------------------------------------|----------|--------|
|     | `Digital Ocean` Server Exists!      | 100      |        |

## Program 6.5 Checklist

This will be checked by running some postman requests to your api, and then checking your mongo
database to ensure that it contains the appropriate additions / changes made via your api.

| :hash:  | Item                                                                   | Possible | Earned |
|----|------------------------------------------------------------------------|----------|--------|
|  :one:  |Path and naming requirements followed.                            | 15       |        |
|  :two:  |Griffin user exists on server                                     | 10       |        |
|  :three:  |`add_user` adds user to mongo collection.                         | 20       |        |
|  :four:  |`update_user` updates existing user.                              | 20       |        |
|  :five:  |`delete_user` deletes user from collection.                       | 20       |        |
|  :six:  |`random_user` finds N random users from random user api, filters unwanted fields, creates top level keys, returns array of users. | 40       |        |
|    | ***Total:***                                                           | 125      |        | 

## Program 7 Checklist


This will be checked by viewing the `data tables` page and ensuring that the required functionality of the page actually works and any changes made are reflected in your mongo database. 

| :hash: | Item                                                                                     | Possible | Earned |
|--------|------------------------------------------------------------------------------------------|----------|--------|
| :one:    | Path and naming requirements followed.                                               | 15       |        |
| :two:   | `Data Tables` displays on page correctly.                                            | 15       |        |
| :three:    | Font awesome icons exist on each row to invoke appropriate modal form (edit,delete). | 20       |        |
| :four:    | Button to add user exists and invokes appropriate form      .                        | 20       |        |
| :five:    | Modal form to `edit user` exists, calls appropriate route, and works.                | 25       |        |
| :six:    | Modal form to `add user` exists, calls appropriate route, and works.                 | 25       |        |
| :seven:    | Modal form to `delete user` exists, calls appropriate route, and works.             | 25       |        |
| :eight:    | Modal form to `delete user` confirms deletion.                                       | 20       |        |
|        | ***Total:***                                                                             | 165      |        |

## Program 8 Checklist

#### Part 1

This will be graded by viewing your page at http://your.ip.address/whereswaldo1 and determining
if the following functionality was implemented correctly.

| :hash:  | Item                                     | Possible | Earned |
|---------|------------------------------------------|----------|--------|
| :one:   | Path and naming requirements followed.   | 20       |        |
| :two:   | Wheres waldo image blurred on page load. | 20       |        |
| :three: | Timer located on page, not running.      | 20       |        |
| :four:  | Timer starts on button click.            | 20       |        |
| :five:  | Image clears on same button click.       | 20       |        |
|         | Total:                                   | 100      |        |


#### Part 2

This will be graded by viewing your page at http://your.ip.address/whereswaldo2. Getting the distance
from / to waldo implies that there is a document in your mongo db that stores a path to an image, along
with the location of waldo on that image. This implies that if we changed the x,y coordinates in mongo,
we would get different distances on the mouse click. Basically, don't hard code values.

| :hash:  | Item                                                                 | Possible | Earned |
|---------|----------------------------------------------------------------------|----------|--------|
| :one:   | Path and naming requirements followed.                               | 15       |        |
| :two:   | Functionality from part 1 still implemented.                         | 15       |        |
| :three: | Image and waldo location stored in a document in a mongo collection. | 30       |        |
| :four:  | Clicking the image returns distance to waldo (console.log the value) | 40       |        |
|         | Total:                                                               | 100      |        |
