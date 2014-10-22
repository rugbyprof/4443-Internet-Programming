# Not Done!

Rc Car store??

The following snippet pulled a variety of pages from the RC web site. We only want to do this once, so we don't hammer thier servers with erroneous requests. 

```php
//List of specific pages at the RC site for us to scrape
$Items = array(
	array('url'=>'http://www.rcplanet.com/RC_Remote_Radio_Control_Cars_Truck_s/364.htm','pages'=> 33,"page_name"=>"cars_trucks"),
	array('url'=>'http://www.rcplanet.com/RC_Remote_Radio_Control_Airplane_Planes_s/368.htm','pages'=>  19,"page_name"=>"airplanes"),
	array('url'=>'http://www.rcplanet.com/RC_Remote_Radio_Control_Heli_Helicopter_s/367.htm','pages'=> 6,"page_name"=>"helicopters"),
	array('url'=>'http://www.rcplanet.com/Quadcopter_Drone_UFO_Multi_Rotor_s/6266.htm','pages'=> 2,"page_name"=>"ufos"),
	array('url'=>'http://www.rcplanet.com/Rock-Crawlers-Radio-Control-s/6265.htm','pages'=> 2,"page_name"=>"crawlers"),
	array('url'=>'http://www.rcplanet.com/RC_Remote_Radio_Control_Boat_s/369.htm','pages'=> 3,"page_name"=>"boats")
);

//Build an associative array with the contents of each page located at the 'source' key in that row.
//We loop through each entry in the $Items array (outer loop), then through each 'page' for that item (inner loop).
for($i=0;$i<sizeof($Items);$i++){
    $url  = $Items[$i]['url'];
	$pages = $Items[$i]['pages'];
	for($p=1;$p<=$pages;$p++){
		$Items[$i]['source'][] = file_get_contents("{$url}?pgnum={$p}");
		sleep(rand(0,2));
	}
}


//Loop through our associative array, and write a list of files locally for us to "parse" for our database.
for($i=0;$i<sizeof($Items[$i]);$i++){
	for($j=0;$j<sizeof($Items[$i]['source']);$j++){
	    echo"./pages/{$Items[$i]['page_name']}_{$j}.htm\n";
		file_put_contents("./pages/{$Items[$i]['page_name']}_{$j}.htm",$Items[$i]['source'][$j]);
	}
}
```
To get the files for your personal use, I tar gzipped them into a compressed archive for ease of snatching:

```bash
wget http://systempause.net/Inventory/pages.tar.gz
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

