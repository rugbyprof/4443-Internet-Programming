## Grab Rc Car Info
___Due 10<sup>th</sup> of October by classtime.___

#### General Instructions

- Create a folder called `rc_store` here: `/var/www/html/4443/`
- Create a file called `index.php` in `rc_store`
- Obtain the pages you will need to "scrape" from here: `http://systempause.net/Inventory/pages.tar.gz` or run the following command from your server in `rc_store`.

```bash
wget http://systempause.net/Inventory/pages.tar.gz
```
- Create a file called `load_db.php` in `rc_store`
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

