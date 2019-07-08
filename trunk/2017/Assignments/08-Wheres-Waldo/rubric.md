 ## Program 8 Checklist

### Part 1

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


### Part 2

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
