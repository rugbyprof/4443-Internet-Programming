## Flow Control

### If Statement

The `if` statement is syntactically equivalent to `C++` (if you want it to be).

```php
if(boolean operation){
  //True branch
}else{
  //False branch
}
```

Here is an alternative syntax (more like `python`)

```php
if (boolean operation):
  //stuff
  //stuff
  //stuff
else:
  //else stuff
  //else stuff
endif;
```

### If Else IF

This allows one more additional change than the previous example.

```php
$boolean=1;
$x=0;

//Notice the else if and the elseif

if($boolean==1){
  $x=1;
}else if($boolean==2){
  $x=2;
}elseif($boolean==3){
  $x=3;
}else{
  $x=4;
}

echo $x."\n";
```

### Switch Statement

The `switch` statement is syntactically equivalent to `C++`, but one 
major difference is that the variable being tested does NOT have to 
be an integer. 

For Example:

```php
switch($some_var){
    case 1 : //Do something when $some_var == 1;
            break;
    case 'Ruby': // Do something when $some_var == 'Ruby';
            break;
    case 42.0 : //Do something when $some_var == 42.0;
            break;
    default : //Do something when $some_var != any prior case.
}
```

### For Loop

### While Loop

### Foreach Loop
