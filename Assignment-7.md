## Assignment 7 - Product scraping

### Due Oct 20<sup>th</sup> by 12:00 Noon.


### Overview
Given the code that we used in class to parse product information from a website, change it to work with a different product page.

#### Needed:

The Php Dom Parser from here: http://simplehtmldom.sourceforge.net/manual.htm

#### Example:

```php
<?php

//Require the necessary library obtained from the link above
require('html_dom.php');

// Create DOM from URL or file
$html = file_get_html('http://www.rcplanet.com/');

//Use a "pre" tag to make the "print_r" look more readable.
echo "<pre>";

//Create an empty array
$content = array();

//Set counter to zero
$i = 0;

//Loop through the "Dom" of www.rcplanet.com and grab needed elements
foreach($html->find('div.product-single-item') as $element){
	$content[$i]['href'] = $element->children[0]->attr['href'];
	$content[$i]['alt'] = $element->children[0]->children[0]->attr['alt'];
	$content[$i]['src'] = $element->children[0]->children[0]->attr['src'];
	$content[$i]['title'] = $element->children[0]->children[0]->attr['title'];
	$content[$i]['price'] = trim($element->find('div.pricing',0)->plaintext);
	$i++;
}

print_r($content);
```

#### Output:

```
Array
(
    [0] => Array
        (
            [href] => http://www.rcplanet.com/Traxxas-Stampede-4x4-Monster-Truck-RTR-ID-Tech_p/tra67054-1.htm
            [alt] => Traxxas Stampede 4x4 Monster Truck RTR with ID Technology TRA67054-1
            [src] => http://cdnll.rcplanet.com/images/m/TRA67054-1.jpg
            [title] => Traxxas Stampede 4x4 Monster Truck RTR with ID Technology TRA67054-1
            [price] => $309.95
        )

...

    [n] => Array
        (
            [href] => http://www.rcplanet.com/Traxxas_Slash_4x4_1_16_Short_Course_Race_Truck_Tit_p/tra70054.htm
            [alt] => Traxxas Slash 4x4 1/16 Short Course Race Truck Titan 12T Motor TRA70054
            [src] => http://cdnll.rcplanet.com/images/m/TRA70054.jpg
            [title] => Traxxas Slash 4x4 1/16 Short Course Race Truck Titan 12T Motor TRA70054
            [price] => $199.95
        )
```
