<?php
// Read uploads directory (now deleted)
$d = scandir('./photos');
$count = 0;

// Decode the student json file and turn it into an associative array
$json = json_decode(file_get_contents('student_data.json'),true);

$dir = scandir('photos');

array_shift($dir);
array_shift($dir);

$photo_ids = [];
$student_ids = [];

for($i=0;$i<sizeof($dir);$i++){
    list($mid,$ext) = explode('.',$dir[$i]);
    $photo_ids[] = $mid;
}

foreach($json as $student){
    $student_ids[] = $student['mustang_id'];
}

$count = 0;
for($i=0;$i<sizeof($photo_ids);$i++){
    if(!in_array($photo_ids[$i],$student_ids)){
        $count++;
        
        unlink("./photos/{$photo_ids[$i]}.jpg");
        echo"deleting: ./photos/{$photo_ids[$i]}.jpg\n";
    }
}

echo"{$count}";




