## Assignment 6 - Css Navbar

### Due Oct 3<sup>rd</sup> by 11:59 p.m. (Yes Friday by Midnight).


### Overview

Your going to add a top navbar to your Portal site, and use a little css to make it look right. 

#### Step 1

- Copy your `index.php` into `navbar.php` inside your `Portal` folder.
- Up to now, you should have the following directory structure in 4443 (__*__ = used in an assignment file at sometime!):

-----
- ![1] Portal
    - ![2] index.php <sup>*</sup>
    - ![2] navbar.php <sup>*</sup>
    - ![2] backend.php 
- ![1] css
    - ![5] bootstrap.min.css
    - ![5] simple-sidebar.css <sup>*</sup>
- ![1] js
    - ![6] bootstrap.min.js
    - ![6] jquery-1.11.0.js
- ![1] partials
    - ![2] registration.php<sup>*</sup>

------

- Find the following element in navbar.php:

```html
        <!-- Page Content -->
        <div id="page-content-wrapper">
```
- Place the following code snippet right before that element:

```html
      <!-- Static navbar -->
      <div class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Project name</a>
          </div>
          <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li><a href="#">Link</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li class="divider"></li>
                  <li class="dropdown-header">Nav header</li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li class="active"><a href="./">Default</a></li>
              <li><a href="../navbar-static-top/">Static top</a></li>
              <li><a href="../navbar-fixed-top/">Fixed top</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </div>
```

Navbar Source: http://getbootstrap.com/examples/navbar/

- Now your going to have to figure out what to do with our menu collapse button: `<i class="fa fa-bars fa-3x" id="menu-toggle"></i>`. I put it in the actual nav bar.

- At this point you should adjust the padding of the following elements to make your navbar stick to the top of the content area, and be 100% wide.
    - .navbar-brand
    - #page-content-wrapper 
Look at the following image to get an idea about padding and margins. The simple explanation is padding is something that creates a buffer on the inside of the element, and a margin creates a buffer around the outside of the element. 

![](http://f.cl.ly/items/0S231o311V3u1h422v0V/box_model.gif)

Here are some example padding and margin css directives:
```css
/* Add padding to the top and bottom but not left and right */
/* This takes 4 params starting from the top and going clockwise around the element */
.element-name{
    padding: 10px 0 10px 0;
}

/* Add a margin to the left and right but not top and bottom */
.element-name{
    margin: 0 10px 0 10px;
}

/* Just apply padding or margin to one side */
/* For both padding and margin just append -left -right -bottom -top to effect a particular side */
.element-name{
    padding-bottom:10px;
    margin-top:5px;
}

/* Remove padding from an element */
.navbar-brand{
    padding: 0px;
}

/* You can even use a negative number to pull or push an item a certain way */
/* You don't need this for our assignment */
.navbar-brand{
    padding-bottom: -10px;
}

```

- After adjusting the padding of both elements (and putting the collapse button inside the navbar), you should have something similar to:

![](http://f.cl.ly/items/1d08123Q0v0T1O0Q0Q27/navbar1.png)

#### Step 2

Now we want to make our navbar "skinny". Right now the height is about `50px`, and I would like to get that down to `30px`. There are a few things we need to consider:

- Any element "within" the navbar that has a height greater than 30px, will not allow us to shrink the navbar.
- Any directive that navbar inherits from will need to be overridden if it dictates a height greater than 30px.
- We probably won't do well searching through bootstrap css, so using chrome's developer tools is important.

First thing we need to do is shrink our "menu" collapse fa-icon. The `3x` means make it 3 times it's original. So we can shrink it by making it `2x` (or two times original).

```html
<!-- Change this -->
<i class="fa fa-bars fa-3x" id="menu-toggle"></i>

<!-- to this -->
<i class="fa fa-bars fa-2x" id="menu-toggle"></i>
```

Remember, that this is a font! So we could actually do this:

```html
<!-- Add a style attribute to change font-size -->
<i class="fa fa-bars" id="menu-toggle" style="font-size:24px"></i>

```

Now, since this isn't a trivial task, here is the css to make it work. If you changed `.navbar-brand` earlier, remove those changes and replace it with these:

```css
.navbar-nav > li > a { padding-top: 5px !important; padding-bottom: 5px !important; }
.navbar { min-height: 28px !important; }
.navbar-brand { padding-top: 5px; padding-bottom: 10px; padding-left: 10px; }
.navbar.navbar-default{
	border-right-width: 0px;
	border-top-width: 0px;
	border-left-width: 0px;
	border-bottom-width: 1px;
	margin-bottom: 2px;
	height: 30px;
}
```

I also added the following to adjust my "menu collapse" button so it would fit right without using `2x or 3x`.

```css
.fa-bars{
    font-size:20px;
}
```

You should have something that looks like:

![](http://f.cl.ly/items/2l2l1t2D2D0h330D2m14/navbar2.png)

#### Step 3

- Push the side navbar down 32 pixels:

```css
#mynavset{
	margin-top: 32px;
}
```

Now it should look like

![](http://f.cl.ly/items/3e2V2q1V0n2V183y340m/navbar3.png)


#### Step 4

Lastly. Look at the following screenshot and make all necessary changes so that you match the styles being shown.

![](http://f.cl.ly/items/3S1x132R212I2513411C/navbar4.png)


I should be able to view this page when I go to: http://your_ip_address/Portal/navbar.php



[1]: https://cdn1.iconfinder.com/data/icons/stilllife/24x24/filesystems/gnome-fs-directory.png
[2]: http://png-2.findicons.com/files/icons/2360/spirit20/20/file_php.png
[3]: http://www.lecollagiste.com/collanews/themes/lilina/web/media/folder.gif
[4]: http://rs.tudelft.nl/~rlindenbergh/publications/html.gif
[5]: https://cdn4.iconfinder.com/data/icons/spirit20/file-css.png
[6]: https://cdn4.iconfinder.com/data/icons/spirit20/file-js.png
