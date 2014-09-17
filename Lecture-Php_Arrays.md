## Arrays

Arrays in php are similar to what we've learned from `C/C++`, with some "extras". Let's start with what you know: 

>An array is a series of elements of the same type placed in contiguous memory locations that can be individually referenced by adding an integer index to a unique identifier. The memory locations must be of the same type and contiguous because of how addresses are calculated creating an offset from a base address.

This is not true for Php. Well, wait ... did you know php was written in `C`? Well it was, but that definition doesn't apply to Php. Here is a more appropriate definition:

>An array is a series of elements of ~~the same type~~ whatever types you want placed ~~in contiguous memory locations~~ somewhere in memory and can be individually referenced by adding ~~an integer index to a unique identifier~~ integers or strings to a unique identifier. ~~The memory locations must be of the same type and contiguous because of how addresses are calculated creating an offset from a base address.~~ The memory locations can hold whatever the heck they want (there are some limitations) [[2]].

Php uses whats referred to as `associative arrays` which maintains a "key=>value" pair association. It really just groups together a set of "key=>value" pairs where you pick the keys, and assign them values. Some other terms that are associated with 
this type of "collection" are: `hash` , `dictionary` , or `map`. Each of these might have a slightly different definition based on context, but they are all pretty synonymous.

Examples:

```php
$Foo = array(8,32,44,9,3);
echo $Foo[3];
//Prints 9

$Foo = array(8=>4,32=>23,44=>12,9=>11,3=87);
echo $Foo[3];
//Prints 87

$Foo = array("Apples"=>4,"Oranges"=>23,"Lemons"=>12,"Limes"=>11,"Kiwis"=>87);
echo $Foo[3];
//Prints "Undefined Offset"

echo $Foo['Kiwis'];
//Prints 87

$Foo[] = "99";
//$Foo now contains ["Apples"=>4,"Oranges"=>23,"Lemons"=>12,"Limes"=>11,"Kiwis"=>87,99];

//You can also use this syntax:
$Foo = ['hello',4,88,"un-related"];
echo $Foo[0];
//Prints hello

```

There are many other "oddities" that occur with arrays. Make sure you look at http://php.net/manual/en/language.types.array.php to see some of them.

Here's one:

```php
$Foo = [5=>1,2,3,4,5];
print_r($Foo);
```
This outputs:
```php
Array
(
    [5] => 1
    [6] => 2
    [7] => 3
    [8] => 4
    [9] => 5
)
```

Some friendly helper functions:
- `var_dump` is a php function that ... dumps out a variable, it gives it's data type and value.
- `print_r` is a php function that ... prints out a complex data type recursively (arrays and objects) to give you a thorough snapshot of that instance of the variable.

Example:
```php
  $a = array(array(1,2,3),array(4,5,6),array(7,8,9),array(10,11,12));
  echo"var_dump output:\n";
  var_dump($a);
  echo"print_r output:\n";
  print_r($a);
```

Output:
```php
var_dump output:
array(4) {
  [0]=>
  array(3) {
    [0]=>
    int(1)
    [1]=>
    int(2)
    [2]=>
    int(3)
  }
  [1]=>
  array(3) {
    [0]=>
    int(4)
    [1]=>
    int(5)
    [2]=>
    int(6)
  }
  [2]=>
  array(3) {
    [0]=>
    int(7)
    [1]=>
    int(8)
    [2]=>
    int(9)
  }
  [3]=>
  array(3) {
    [0]=>
    int(10)
    [1]=>
    int(11)
    [2]=>
    int(12)
  }
}
print_r output:
Array
(
    [0] => Array
        (
            [0] => 1
            [1] => 2
            [2] => 3
        )

    [1] => Array
        (
            [0] => 4
            [1] => 5
            [2] => 6
        )

    [2] => Array
        (
            [0] => 7
            [1] => 8
            [2] => 9
        )

    [3] => Array
        (
            [0] => 10
            [1] => 11
            [2] => 12
        )

)
```

[2]: http://php.net/manual/en/language.types.array.php  "Php Arrays"

2. http://php.net/manual/en/language.types.array.php
