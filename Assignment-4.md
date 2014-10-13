## Assignment 4 - Setting up Assignment Portal

#### Due Sep 14<sup>th</sup> by 12:00 p.m.

This is a continuation of Assignment 3.

### Replace the button with a glyphicon

| From    |   To |
|---------|------|
|![](http://f.cl.ly/items/3B1r460M1Q3Q091E1o1N/Screenshot%202014-08-27%2011.52.49.png)|![](http://f.cl.ly/items/3z1B1V0r40032w0C1M2D/Screenshot%202014-08-27%2011.50.08.png)|

Place the following in the `head` of your document:

```html
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
```

Find the button code, and change it to:

```html
<i class="fa fa-bars fa-3x" id="menu-toggle"></i>
```

- Make sure you make your button show up in the top left hand side of the content portion of your site.

### Add a registration form to your portal:

- Create the following:
    - `register.php` in the `partials` folder.

-----

- Up to now, you should have the following directory structure (__*__ = used in an assignment file at sometime!):

-----
- ![1] Portal
    - ![2] index.php <sup>*</sup>
    - ![2] navbar.php <sup>*</sup>
- ![1] css
    - ![5] bootstrap.css
    - ![5] bootstrap.min.css
    - ![5] simple-sidebar.cs
- ![1] js
    - ![6] bootstrap.js
    - ![6] bootstrap.min.js
    - ![6] jquery-1.11.0.js
- ![1] partials

------

- Edit your `index.php` file, and make sure the switch statement handles `content=register`

```php
		<?php
		switch($_GET['content']){
			case 'register': include("partials/register.php");
							  break;
			case 'dashboard': echo"your momma";
							  break;
			case 'testing': include("partials/forms.php");
							  break;
			default : include("partials/default.php");
		}

		?>
```

- Inside your `partials/registration.php` file, place the following code:

```html
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-4 well well-sm">
            <legend><a href="http://www.jquery2dotnet.com"><i class="glyphicon glyphicon-globe"></i></a> Sign up!</legend>
            <form action="#" method="post" class="form" role="form">
            <div class="row">
                <div class="col-xs-6 col-md-6">
                    <input class="form-control" name="firstname" placeholder="First Name" type="text"
                        required autofocus />
                </div>
                <div class="col-xs-6 col-md-6">
                    <input class="form-control" name="lastname" placeholder="Last Name" type="text" required />
                </div>
            </div>
            <input class="form-control" name="youremail" placeholder="Your Email" type="email" />
            <input class="form-control" name="reenteremail" placeholder="Re-enter Email" type="email" />
            <input class="form-control" name="password" placeholder="New Password" type="password" />
            <label for="">
                Birth Date</label>
            <div class="row">
                <div class="col-xs-4 col-md-4">
                    <select class="form-control">
                        <option value="Month">Month</option>
                    </select>
                </div>
                <div class="col-xs-4 col-md-4">
                    <select class="form-control">
                        <option value="Day">Day</option>
                    </select>
                </div>
                <div class="col-xs-4 col-md-4">
                    <select class="form-control">
                        <option value="Year">Year</option>
                    </select>
                </div>
            </div>
            <label class="radio-inline">
                <input type="radio" name="sex" id="inlineCheckbox1" value="male" />
                Male
            </label>
            <label class="radio-inline">
                <input type="radio" name="sex" id="inlineCheckbox2" value="female" />
                Female
            </label>
            <br />
            <br />
            <button class="btn btn-lg btn-primary btn-block" type="submit">
                Sign up</button>
            </form>
        </div>
    </div>
</div>
```
- Also, in the file: `Portal/css/simple-sidebar.css` add the following code to the bottom:

```css
.form-control { margin-bottom: 10px; }
```

[1]: https://cdn1.iconfinder.com/data/icons/stilllife/24x24/filesystems/gnome-fs-directory.png
[2]: http://png-2.findicons.com/files/icons/2360/spirit20/20/file_php.png
[3]: http://www.lecollagiste.com/collanews/themes/lilina/web/media/folder.gif
[4]: http://rs.tudelft.nl/~rlindenbergh/publications/html.gif
