<?php
// Read uploads directory (now deleted)
$d = scandir('./photos');
$count = 0;

// Decode the student json file and turn it into an associative array
$json = json_decode(file_get_contents('student_data.json'),true);


$index = 0;
foreach($json as $student){
    $fname = $student['first_name'];
    $lname = $student['last_name'];
    $photo = $student['photo'];
    

    if(file_exists($photo)){
        list($width, $height, $type, $attr) = getimagesize("{$photo}");
        echo"Student: {$fname} {$lname} has a photo and its size is: {$width}x{$height}\n";
    }
}

