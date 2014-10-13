## Assignment 7 - Product scraping

### Due Oct 20<sup>th</sup> by 12:00 Noon.


### Overview
Given the code that we used in class to parse product information from a website, change it to work with a different product page. The changes should be minimal and not be that hard. 

- We initially grabbed (on accident) from the following:

> http://www.rcplanet.com/

- We actually wanted to obtain product from here:

> http://www.rcplanet.com/RC_Remote_Radio_Control_Heli_Helicopter_s/367.htm?pgnum=1&pgsize=all

#### Setup

- Create a folder called `inventory` in your `/var/www/html/Portal` folder.
- Create a file called `scrape1.php` in `inventory`.
- Run the following command from your `inventory` directory:

```bash
$ wget http://systempause.net/Inventory/html_dom.tar.gz
$ tar -zxf html_dom.tar.gz
```

> I tar gzipped the file because if we use `wget` to obtain a `php` file, it will be interpreted by the php interperter before it leaves the server, and therefore no php will be sent with the request.  This way you get the php, and just extract the contents. I could also have appended a '.txt' extenstion on it to get the same results:)

- Now you have the [HtmlDom](http://simplehtmldom.sourceforge.net/) library. HtmlDom Docs [here](http://simplehtmldom.sourceforge.net/manual.htm).

- Also, grab your own copy of the source file. We're doing this so we don't hammer thier server. You can practice just as well reading straight from your own directoy. The command below will grab the helicopter page, and write it into `source.html`.

```bash
$ wget http://www.rcplanet.com/RC_Remote_Radio_Control_Heli_Helicopter_s/367.htm?pgnum=1&pgsize=all -O source.html
```

- Up to now, you should have the following directory structure:

- ![1] inventory
    - ![2] scrape1.php
    - ![4] source.html

### Assignment

3. Copy the example from below into `scrape1.php`
4. Make any necessary changes so the output structure matches what we did in class, but it comes from the source document we grabbed and placed in your directory.  

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




[1]: https://cdn1.iconfinder.com/data/icons/stilllife/24x24/filesystems/gnome-fs-directory.png
[2]: http://png-2.findicons.com/files/icons/2360/spirit20/20/file_php.png
[3]: http://www.lecollagiste.com/collanews/themes/lilina/web/media/folder.gif
[4]: http://rs.tudelft.nl/~rlindenbergh/publications/html.gif

