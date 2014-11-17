## Rc Car Additions
November 24<sup>th</sup> by classtime.

#### General Instructions

In the last assignment, you did the following:

- Create a folder called `shopping_cart` in `/var/www/html/4443/`
- Create a file called `index.php` in `shopping_cart`
- Create a file called `backend.php` in `shopping_cart`

#### Assignment 10's directory structure: 

-----
- ![1] 4443
	- ![1] shopping_cart
	    - ![2] index.php
	    - ![2] backend.php
	    - ![1] thumbs (optional)
	   
------

#### Database Backend

- Create a database called RC
- Get the newest version of the products table, and load it into your RC database:
```
wget http://systempause.net/shopping_cart/products.sql
```
- This version has product id's so we can get images as well as categories.

#### One Additional Change

If you have all the images in your optional `thumbs` directory then you don't have to do this, but if you don't have all the images, then you need to change the link to each thumbnail to point to the cdn.

Change:

```
<a href="" class="img-modal" data="7"><img src="http://systempause.net/homepage/thumbs/7.png" alt=""></a>
```
to

```
<a href="" class="img-modal" data="7"><img src=http://cdnll.rcplanet.com/images/xl/WALHM-V200D02-2402D.jpg" alt=""></a>
```

Where `WALHM-V200D02-2402D` is the `ProdNum` from the new table.

#### Fix Pagination

![](http://f.cl.ly/items/2e0d14262R403u0v3v0q/Screenshot%202014-11-17%2011.31.37.png)

- Fix the max value (end of list) problem, so the link for "next" will be disabled if there are no more products to view.
- Fix the min value (beginning of list) problem, so it won't go below 0.
- Fix the display of "0" so instead of displaying 0-20, it displays 1-20, and subsequently 21-30, 31-40, etc..
- Make the middle portion (0-20 in the image above), a drop down list of all available pages.






