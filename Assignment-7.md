#### Not DONE!

## Assignment 7 - Product scraping

### Due Oct 20<sup>th</sup> by 12:00 Noon.


### Overview
Given the code that we used in class to parse product information from a website, change it to work with a different product page.

#### Needed:

Grab Php Dom Parser. I tar gzipped the file because if we use wget to obtain a `php` file, it will be interpreted by the `php` interperter before it leaves the server, and therefore no `php` will be sent with the request.  This way you get the php, and just extract the contents. I could also have appended a '.txt' extenstion on it to get the same results:)

```bash
$ wget http://systempause.net/Inventory/html_dom.tar.gz
$ tar -zxf html_dom.tar.gz
```

Here is the documentation for HtmlDom: http://simplehtmldom.sourceforge.net/manual.htm

#### Example from class:

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

### Assignment

- The code and output above was created by reading in the contents from the main page at: 

> http://www.rcplanet.com/

- We need the same output, but from the product page for just helicopters:

> http://www.rcplanet.com/RC_Remote_Radio_Control_Heli_Helicopter_s/367.htm?pgnum=1&pgsize=all

1. Create a folder called `inventory` in your `/var/www/html/Portal` folder.
2. Create a file called `scrape1.php` in `inventory`
3. Copy the above code into `scrape1.php`
4. Make any necessary changes so the output structure matches what we did in class. 


