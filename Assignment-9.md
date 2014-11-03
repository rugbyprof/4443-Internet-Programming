## Grab Rc Car Info
___Due 10<sup>th</sup> of November by classtime.___

#### General Instructions

- Create a folder called `rc_store` in `/var/www/html/4443/`
- Create a folder called `thumbs` in `rc_store`
- Create a file called `index.php` in `rc_store`
- Obtain the pages you will need to "scrape" from here: `http://systempause.net/Inventory/pages.tar.gz` or run the following command from your server in `rc_store`.

```bash
wget http://systempause.net/Inventory/rc_pages.tar.gz
tar -zxf rc_pages.tar.gz
```
- Create a file called `load_db.php` in `rc_store`
- You should have the following directory structure:

-----
- ![1] 4443
	- ![1] rc_store
	    - ![2] index.php
	    - ![2] load_db.php
	    - ![1] rc_pages
	    - ![1] thumbs

------

- Create a database called `RC_Store` in mysql.
- Run the following `sql` to create the necessary tables:

```sql
CREATE TABLE IF NOT EXISTS `Products` (
  `ProdID` int(6) NOT NULL,
  `Name` varchar(128) NOT NULL,
  `ShortTitle` varchar(128) NOT NULL,
  `Description` text NOT NULL,
  `Link` varchar(128) NOT NULL,
  `Price` float(7,2) NOT NULL,
  PRIMARY KEY (`ProdID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `Media` (
  `ProdID` int(6) NOT NULL,
  `Type` enum('thumb','medium','large','video') NOT NULL,
  `Location` varchar(128) NOT NULL,
  `Width` int(5) NOT NULL,
  `Height` int(5) NOT NULL,
  `Size` int(11) NOT NULL,
  PRIMARY KEY (`ProdID`,`Type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
```

-----

- At this point we have:
    - A directory `rc_pages` that contains all the html content we need to scrape.
    - An empty thumbs directory that will hold all the "images" for the toys.
    - An empty `index.php` file (this will be used in assignment 10)
    - An empty `load_db.php` file where all your code for scraping will go.

___Now we can start coding___

### Your program

You have the html_dom parser from Assignment 7. But here is a reference to it just in case:

- [HtmlDom](http://simplehtmldom.sourceforge.net/). 
- [HtmlDom Docs](http://simplehtmldom.sourceforge.net/manual.htm).

Here is the code we used in class to scrape a single page:

```php
//Turn errors on for dev purposes
ini_set('display_errors',1);  
error_reporting(E_ALL);

//Connect to database
$conn=mysqli_connect("localhost","user","password","database");
// Check connection
if (mysqli_connect_errno()) {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	exit;
}

//We emptied some previously populated tables as we were testing
//Be careful with these statements
$result = $conn->query("truncate Products");
$result = $conn->query("truncate Media");

//Require the html dom parsing library
require('html_dom.php');

//Intialize empty array (not required by php, but good practice)
$content = array();

//Set counter to 0
$i = 0;

//foreach 'div.product-single-item' or a div tag that has the class 'product-single-item'
foreach($html->find('div.product-single-item') as $element){
	//Pull html attributes out of each tag with info pertaining to each product
	$content[$i]['href'] = $element->children[0]->attr['href'];
	$content[$i]['alt'] = $element->children[0]->children[0]->attr['alt'];
	$content[$i]['src'] = $element->children[0]->children[0]->attr['src'];
	$content[$i]['title'] = $element->children[0]->children[0]->attr['title'];
	
	//The price needed special treatment so we could store it as an actual "float", so 
	//we trimmed whitespace and the '$' off of the price.
	$content[$i]['price'] = trim($element->find('div.pricing',0)->plaintext);
	$content[$i]['price'] = trim($content[$i]['price'],"$");
	
	//Build our sql query with this iterations data
	$sql = "INSERT INTO `RC_Scrape`.`Products` (`ProdID`, `ShortTitle`, `Link`, `Price`) 
		VALUES ('{$i}','{$content[$i]['alt']}','{$content[$i]['href']}','{$content[$i]['price']}')";
	$result = $conn->query($sql);
	
	//getimagesize returns an array with 4 items
	//the list function pulls all 4 items out of the array, and puts them into variable names 
	list($width, $height, $type, $attr) = getimagesize($content[$i]['src']);
	$thumb = file_get_contents($content[$i]['src']);
	
	//Write the image to our local file system with a name of our choice
	file_put_contents("./thumbs/{$i}.png",$thumb);
	
	//Build another sql statement to store the image information. We are storing the image in a seperate
	//table to keep our database "normalized". This way we can store multiple images for a single product
	//without cramming it into a single table.
	$sql = "INSERT INTO `RC_Scrape`.`Media` (`ProdID`, `Type`, `Location`, `Width`,`Height`,`Size`) 
		VALUES ('{$i}','thumb','{$content[$i]['src']}','{$width}','{$height}','0')";
	$result = $conn->query($sql);
	$i++;
}

```

- Extend the above example so that it:
    - Reads each of the pages in `rc_pages` 
    - Loads the info for each product into the database in the `Products` table.
    - Creates an image file in `thumbs` for each product with the image file name being the product number of the item.
    - Also loads the `Media` table with the appropriate information.

[1]: https://cdn1.iconfinder.com/data/icons/stilllife/24x24/filesystems/gnome-fs-directory.png
[2]: http://png-2.findicons.com/files/icons/2360/spirit20/20/file_php.png
[3]: http://www.lecollagiste.com/collanews/themes/lilina/web/media/folder.gif
[4]: http://rs.tudelft.nl/~rlindenbergh/publications/html.gif
[5]: https://cdn4.iconfinder.com/data/icons/spirit20/file-css.png
[6]: https://cdn4.iconfinder.com/data/icons/spirit20/file-js.png


