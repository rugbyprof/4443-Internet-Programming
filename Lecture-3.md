Reference: http://www.cssbasics.com/css-divisions/

-----

## Applying CSS

### Divisions

- Divisions are a block level HTML element used to define sections of an HTML file. 
- A division can contain all the parts that make up your website.
- Including additional divisions, spans, images, text and so on.
- The core element used in layouts.
- You define a division within an HTML file by placing the following between the <body></body> tags:

```html
<div id=”container”>
Site contents go here
</div>
```

-----

### Spans

- Spans are very similar to divisions except they are an inline element versus a block level element. 
- No linebreak is created when a span is declared.
- You can use a span tag to style portions of text, as shown in the following:

```html
<span class=”italic”>This text is italic</span>
```

-----

### Margins
##### Inherited: No

- The margin property declares the margin between an HTML element and the elements around it. 
- The margin property can be set for the top, left, right and bottom of an element. 

```css
  margin-top: length percentage or auto; 
  margin-left: length percentage or auto;
  margin-right: length percentage or auto;
  margin-bottom: length percentage or auto;
```

As you can also see in the above example you have 3 choices of values for the margin property

- length
- percentage
- auto

You can also declare all the margins of an element in a single property as follows:

```css
  margin: 10px 10px 10px 10px;
```

If you declare all 4 values in a single declaration, they are ordered as follows:

- top
- right
- bottom
- left

If only one value is declared, it sets the margin on all sides:

```css
  margin: 10px;
```

If you only declare two or three values, the undeclared values are taken from the opposing side:

```css
  margin: 10px 10px; /* 2 values */
  margin: 10px 10px 10px; /* 3 values */
```

- You can also set the margin property to negative values. 
- If you do not declare the margin value of an element, the margin is 0 (zero).

```css
  margin: -10px;
```

Elements like paragraphs have default margins in some browsers, to combat this set the margin to 0 (zero).

```css
p {
  margin: 0;
}
```

> You do not have to add px (pixels) or whatever units you use, if the value is 0 (zero).

-----

### Padding
##### Inherited: No

Padding is the distance between the border of an HTML element and the content within it.

- Most of the rules for margins also apply to padding, except there is no “auto” value.
- Negative values cannot be declared for padding.

```css
padding-top: length percentage; 
padding-left: length percentage;
padding-right: length percentage;
padding-bottom: length percentage;
```

As you can also see in the above example you have 2 choices of values for the padding property

- length
- percentage

You can also declare all the padding of an element in a single property as follows:

```css
padding: 10px 10px 10px 10px;
```

If you declare all 4 values as I have above, the order is as follows:

- top
- right
- bottom
- left

If only one value is declared, it sets the padding on all sides:

```css
padding: 10px;
```

If you only declare two or three values, the undeclared values are taken from the opposing side:

```css
padding: 10px 10px; /* 2 values */
padding: 10px 10px 10px; /* 3 values */
```

> If you do not declare the padding value of an element, the padding is 0 (zero).<br>
You do not have to add px (pixels) or whatever units you use, if the value is 0 (zero).

-----

### Text Properties
##### Inherited: Yes

#### Color

You can set the color of text with the following:
```css
  color: value;
```

Possible values are

- color name – example:(red, black…)
- hexadecimal number – example:(#ff0000, #000000)
- RGB color code – example:(rgb(255, 0, 0), rgb(0, 0, 0))

#### Text Align
You can align text with the following:
```css
  text-align: value;
```

Possible values are

- left
- right
- center
- justify
- Examples:

#### Text Decoration
You can decorate text with the following:

```css
  text-decoration: value;
```

Possible values are

- none
- underline
- overline
- line through
- blink

#### Text Indent
You can indent the first line of text in an HTML element with the following:
```css
  text-indent: value;
```

Possible values are

- length
- percentage

### Text Transform
You can control the size of letters in an HTML element with the following:

```css
  text-transform: value;
```

Possible values are:

- none
- capitalize
- lowercase
- uppercase

#### White Space
You can control the whitespace in anHTML element with the following:
```css
  white-space: value;
```

Possible values are:

- normal
- pre
- nowrap

-----

### Font Properties
##### Inherited: Yes

#### Font
The font property can set the style, weight, variant, size, line height and font:

```css
  font: italic bold normal small/1.4em Verdana, sans-serif;
```

The above would set the text of an element to an italic style a bold weight a normal variant a relative size a line height of 1.4em and the font to Verdana or another sans-serif typeface.


#### Font-Family
You can set what font will be displayed in an element with the font-family property.

There are 2 choices for values:

- family-name
- generic family

If you set a family name it is best to also add the generic family at the end. As this is a priortized list. So if the user does not have the specified font name it will use the same generic family. (see below)

```css
  font-family: Verdana, sans-serif;
```

#### Font Size
You can set the size of the text used in an element by using the font-size property.
```css
  font-size: value;
```

There are a lot of choices for values:

| Largest  |         |           |          |         |          |         |           | Smallest | Integer |
|----------|---------|-----------|----------|---------|----------|---------|-----------|----------|---------|
| xx-large | x-large | larger    | large    | medium  | small    | smaller | x-small   | xx-small | length  |

#### % (percent)

Percent specifies the portion of the element in ... percentages. Wow. It is trickier than you think.

#### Font Style
You can set the style of text in a element with the font-style property
```css
font-style: value;
```

Possible values are

- normal
- itailc
- oblique

#### Font Variant

You can set the variant of text within an element with the font-variant property

```
  font-variant: value;
```

Possible values are

- normal
- small-caps

#### Font Weight
You can control the weight of text in an element with the font-weight property:
```css
  font-weight: value;
```

Possible values are

- lighter
- normal
- 100
- 200
- 300
- 400
- 500
- 600
- 700
- 800
- 900
- bold
- bolder

-----

#### Anchors, Links and Pseudo Classes

Below are the various ways you can use CSS to style links.
```css
a:link {color: #009900;}
a:visited {color: #999999;}
a:hover {color: #333333;}
a:focus {color: #333333;}
a:active {color: #009900;}
```

Now lets take a look at what each one of the above link styles actually does.

`a:link {color: #009900;}` The first on the list sets the color of a link when no event is occuring

`a:visited {color: #999999;}` The second sets the color a link changes to, when the user has already visited that url

`a:hover {color: #333333;}` The third sets the color a link changes to as the user places their mouse pointer over the link

`a:focus {color: #333333;}` The fourth is primarilly for the same purpose as the last one, but this one is for users that are not using a mouse and are tabbing through the links via there keyboards tab key, it sets the color a link changes to as the user tabs through the links

`a:active {color: #009900;}` The fifth on the list sets the color a link changes to as it is pressed.

> You must declare the `a:link` and `a:visited` before you declare `a:hover`.<br> Furthermore, you must declare `a:hover` before you can declare `a:active`.

Using the above code will style all links on your web page, unless you declare a seperate set of link styles for a certain area of your webpage.

#### Pseudo Classes

You can set links contained in different parts of your web page to be different colors by using the pseudo class. For example, lets say you want your links in the content area to have a different color then the links in the left or right column of your webpage.

You can do this in the following fashion:
```css
#content a:link {color: #009900;}
#content a:visited {color: #999999;}
#content a:hover {color: #333333;}
#content a:focus {color: #333333;}
#content a:active {color: #009900;}
```

- Now assuming that you have your main content in a division named “content” all links within that division will now be styled by this new style selector. 
- Should your selector have a different name, just change the #content selector to match your division name.

Then for the links in a column you could use the following:
```css
#column a:link {color: #009900;}
#column a:visited {color: #999999;}
#column a:hover {color: #333333;}
#column a:focus {color: #333333;}
#column a:active {color: #009900;}
```

Once again, this assumes the name of the column division, just change the name to match yours.

This same method can be accomplished by declaring a class instead of an id.
```css
a.column:link {color: #009900;}
a.column:visited {color: #999999;}
a.column:hover {color: #333333;}
a.column:focus {color: #333333;}
a.column:active {color: #009900;}
```

Though in this case you will need to add a class to each link
```html
<a class=”column” href=”” title=””>some link text</a>
```
But, there is still yet an easier way
```css
.column a:link {color: #009900;}
.column a:visited {color: #999999;}
.column a:hover {color: #333333;}
.column a:focus {color: #333333;}
.column a:active {color: #009900;}
```
Then in your HTML:
```html
<div class=”column”>
<a href=”” title=””>some link text</a>
</div>
```

-----

#### Backgrounds
##### Inherited: No

#### Background
You can style the background of an element in one declaration with the background property.

```css
background: #ffffff url(path_to_image) top left no-repeat fixed;
```
Values:
- attachment
- color
- image
- position
- repeat

http://jsfiddle.net/DM88s/4/

Or you can set each property individually


#### Background Attachment

If you are using an image as a background. You can set whether the background scrolls with the page or is fixed when the user scrolls down the page with the background-attachment property
```css
background-attachment: value;
```

Values:
- fixed
- scroll

#### Background Color
You can specifically declare a color for the background of an element using the background-color property.
```css
background-color: value;
```
Values:
- color name
- hexadecimal number
- RGB color code
- transparent

#### Background Image
You can set an image for the background of an element using the background-image property.
```css
background-image: url(path_to_image);
```
Values:
- url
- none

#### Background Position
You can position an image used for the background of an element using the background-position property.
```css
background-position: value;
```
Values:
- top left
- top center
- top right
- center left
- center center
- center right
- bottom left
- bottom center
- bottom right
- x-% y-%
- x-pos y-pos

#### Background Repeat
You can set if an image set as a background of an element is to repeat (across=x   and/or   down=y) the screen using the background-repeat property.
```css
background-repeat: value;
```
Values:
- no-repeat
- repeat
- repeat-x
- repeat-y

http://jsfiddle.net/DM88s/1/

-----

#### Borders
##### Inherited: No

#### Border
You can set the color, style and width of the borders around an element in one declaration by using the border property.
```css
border: 1px solid #333333;
```
Values:

- color
- style
- width
Or you can set each property individually


#### Border Color
You can set the color of a border independently with the border-color property.
```css
border-color: value;
```
Values:

- color name
- hexadecimal number
- RGB color code
- transparent

#### Border Style
You can set the style of a border independently with the border-style property.
```css
border-style: value;
```
Values:

- dashed
- dotted
- double
- groove
- hidden
- none
- outset
- ridge
- solid

#### Border Width
You can set the width of a border independently with the border-width property.
```css
border-width: value;
```
Values:

- Length
- Thin
- Medium
- Thick
Or you can set the elements for each borders side individually

-----

#### Lists
##### Inherited: Yes

#### List Style
You can control the appearance of ordered and unordered lists in one declaration with the list-style property
```css
list-style: value value;
```
Values:

- image
- position
- type
Or you can control them individually


#### List Style Image
You can use an image for the bullet of unordered lists with the list-style property
```css
list-style-image: url(path_to_image.gif, jpg or png);
```
If you use an image, it is a good idea to declare the list-style-type also in case the user has images turned off.


#### List Style Position
You can control the position of ordered and unordered lists with the list-style-position property
```css
list-style-position: value;
```
Values

- inside
- outside

#### List Style Type
You can control the type of bullet ordered and unordered lists use with the list-style-type property
```css
list-style-type: value;
```
Values

- disc
- circle
- square
- decimal
- lower-roman
- upper-roman
- lower-alpha
- upper-alpha
- none

-----

#### Positioning
##### Inherited: No

#### Position
The position property (as you may have guessed) changes how elements are positioned on your webpage.
```css
position: value;
```
Values:

- static
- relative
- absolute
- fixed
Now, what does all that mean?

#### Static
Static positioning is by default the way an element will appear in the normal flow of your HTML file. It is not necessary to declare a position of static. Doing so, is no different than not declaring it at all.
```css
position: static;
```

#### Relative
Positioning an element relatively places the element in the normal flow of your HTML file and then offsets it by some amount using the properties left, right, top and bottom. This may cause the element to overlap other elements that are on the page, which of course may be the effect that is required.
```css
position: relative;
```

#### Absolute
Positioning an element absolutely, removes the element from the normal flow of your (X)HTML file, and positions it to the top left of its nearest parent element that has a position declared other than static. If no parent element with a position other than static exists then it will be positioned from the top left of the browser window.
```css
position: absolute;
```

```css
position: absolute; top: 10px; right: 10px;
```

#### Fixed
Positioning an element with the fixed value, is the same as absolute except the parent element is always the browser window. It makes no difference if the fixed element is nested inside other positioned elements.

Furthermore, an element that is positioned with a fixed value, will not scroll with the document. It will remain in its position regardless of the scroll position of the page.

At this time IE6 (Internet Explorer 6) does not support the fixed value for the positioning of an element. Thus it will not position fixed elements correctly and will still scroll with the page. To see this effect in action you will need to use a standards compliant browser, such as Firefox 1.0
```css
position: fixed;
```
When positioning elements with relative, absolute or fixed values the following properties are used to offset the element:

- top
- left
- right
- bottom




