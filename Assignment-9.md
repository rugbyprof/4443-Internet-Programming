# Not Done!

Rc Car store??

The following snippet pulled a variety of pages from the RC web site. We only want to do this once, so we don't hammer thier servers with erroneous requests. 

```php
//List of specific pages at the RC site for us to scrape
$Items = array(
	array('url'=>'http://www.rcplanet.com/RC_Remote_Radio_Control_Cars_Truck_s/364.htm','pages'=> 33,"page_name"=>"cars_trucks"),
	array('url'=>'http://www.rcplanet.com/RC_Remote_Radio_Control_Airplane_Planes_s/368.htm','pages'=>  19,"page_name"=>"airplanes"),
	array('url'=>'http://www.rcplanet.com/RC_Remote_Radio_Control_Heli_Helicopter_s/367.htm','pages'=> 6,"page_name"=>"helicopters"),
	array('url'=>'http://www.rcplanet.com/Quadcopter_Drone_UFO_Multi_Rotor_s/6266.htm','pages'=> 2,"page_name"=>"ufos"),
	array('url'=>'http://www.rcplanet.com/Rock-Crawlers-Radio-Control-s/6265.htm','pages'=> 2,"page_name"=>"crawlers"),
	array('url'=>'http://www.rcplanet.com/RC_Remote_Radio_Control_Boat_s/369.htm','pages'=> 3,"page_name"=>"boats")
);

//Build an associative array with the contents of each page located at the 'source' key in that row.
//We loop through each entry in the $Items array (outer loop), then through each 'page' for that item (inner loop).
for($i=0;$i<sizeof($Items);$i++){
    $url  = $Items[$i]['url'];
	$pages = $Items[$i]['pages'];
	for($p=1;$p<=$pages;$p++){
		$Items[$i]['source'][] = file_get_contents("{$url}?pgnum={$p}");
		sleep(rand(0,2));
	}
}


//Loop through our associative array, and write a list of files locally for us to "parse" for our database.
for($i=0;$i<sizeof($Items[$i]);$i++){
	for($j=0;$j<sizeof($Items[$i]['source']);$j++){
	    echo"./pages/{$Items[$i]['page_name']}_{$j}.htm\n";
		file_put_contents("./pages/{$Items[$i]['page_name']}_{$j}.htm",$Items[$i]['source'][$j]);
	}
}
```
