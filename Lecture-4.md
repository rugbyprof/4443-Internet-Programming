## Php Basics - No really just the basics

#### Variables

Php doesn't require you to "declare" a variable, per se, well not in the way that `C` requires it.
You can, you just don't have to. So ... how does `Php` know what "type" of variable that your using?
It uses `dynamic typing`:

>A language has dynamic typing when it does not associate values strictly with a specific type, but it is designed to 
"decide" what the type of a value should be at runtime, based on how you are attempting to use it.

When we declare a variable in `C`:

```c++
  int x = 0;
  double Avg = 0.0;
  float data_nums[10];
  char* UserName = "SgtRock";
```

we are telling the compiler that "when you see a properly formed variable name like `x`, it's a variable and 
it holds an integer value. Please allocate 4 bytes for variable that I call `x`. If I try to stick a double
value in it (4.2), I know that you will truncate the ".2" because an integer doesn't store floating point
values. Similar stuff goes with `y` and `z`.

In Php, instead of "declaring" a variable, we simply use the `$` in front of our properly formed variable name. This
alerts the Php interpreter (not compiler) that when you see this "string" with a `$` sign in front of it, it's a
variable, and I can put anything in it I want, and it will be "typed" according to what I assign to it.

For example:

```php

$x = 10;                //x is an integer
$x = 'hello';           //x is a string
$x = new SomeObject();  //x is an object
```

Php does things to a variable based on what type it is. Wait ... what types are there?
- Booleans
- Integers
- Floating point numbers
- Strings
- Arrays
- Objects
- Resources
- NULL

```php
$foo = "0";  // $foo is string (ASCII 48)
$foo += 2;   // $foo is now an integer (2)
$foo = $foo + 1.3;  // $foo is now a float (3.3)
$foo = 5 + "10 Little Piggies"; // $foo is integer (15)
$foo = 5 + "10 Small Pigs";     // $foo is integer (15)
```
(Ref: [1])

[1]: http://php.net  "Juggling Types"
