<?php
set_time_limit(0);
$bigArray = array();
$myurl = array();

$count = 1;
$total = 1;


require("RollingCurl.php");


foreach ($json as $row){
$bigArray = "https://graph.facebook.com/app?access_token=".$row["accesstoken"];
array_push($myurl,$bigArray);	
}

$myurl = array_unique($myurl);
$rc = new RollingCurl("request_callback");
$rc->window_size = 200;
foreach ($myurl as $url) {
    $request = new RollingCurlRequest($url);
    $rc->add($request);
	flush();
}
$rc->execute();

function request_callback($response, $info) {
	global $count;
	global $total;
	global $mysqli;
	$test = json_decode($response,true);
	if(isset($test['error'])){
		$token = explode("access_token=", $info['url']);
        echo "Error ".$count++."\r\n<br>";
		flush();
	}else{
		$token = explode("access_token=", $info['url']);
        echo "Success ".$total++."\r\n<br>";
		flush();
	}
flush();
}


?>
