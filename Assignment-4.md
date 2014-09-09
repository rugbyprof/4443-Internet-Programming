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

### Add an html form:

- Goto http://bootsnipp.com/snippets/featured/login-amp-signup-forms-in-panel to gain access to our form snippet.
- Create the following:
    - `register.php` in the `partials` folder.
- Edit your index.php file, and make sure the switch statement handles `content=register`

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


    - `registration.php` and store that file in your `partials` folder.
- Go to the website below, and place the code (html) in the registration page. 
- Make if viewable by pressing the `registration` link on the left.
