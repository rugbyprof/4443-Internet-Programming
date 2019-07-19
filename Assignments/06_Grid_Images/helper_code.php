<?php
// Reads a directory into an array
$dir = scandir('./card_services/photos');

// This removes the '.' and the '..' from the directory listing
array_shift($dir);
array_shift($dir);

// Loop through and print out each file name
foreach($dir as $file){
    echo"{$file}\n";
}

// Decode the student json file and turn it into an associative array
$json = json_decode(file_get_contents('student_data.json'),true);

// Loop through and get a students info
foreach($json as $student){
    $fname = $student['first_name'];
    $lname = $student['last_name'];
    $photo = $student['photo'];
    

    // Checks to see if a students photo exists at the path given
    if(file_exists($photo)){
        // If it does, get the size of the image
        list($width, $height, $type, $attr) = getimagesize("{$photo}");

        // Print out the students name and photo size.
        echo"Student: {$fname} {$lname} has a photo and its size is: {$width}x{$height}\n";
    }
}

