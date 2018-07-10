<?php

$api_key = getenv('NANONETS_API_KEY');
$model_id = getenv('NANONETS_MODEL_ID');
$url = 'https://app.nanonets.com/api/v2/ObjectDetection/Model/'.$model_id;

$payload = json_encode(array('categories' => array('TieFighter', 'MillenniumFalcon')));

$context = stream_context_create(array(
    'http' => array(
        'header' => "Authorization: Basic " . base64_encode("$api_key:"),
        'method' => 'GET',
    ),
));
$result = file_get_contents($url, false, $context);
if ($result === FALSE) {
	echo "Some Error in API";
}
else{
	$res = json_decode($result);
	$model_state = $res->state;
	$model_status = $res->status;
	if ($model_state != 5){
		echo "The model isn't ready yet, it's status is:".$model_status."\n";
		echo "We will send you an email when the model is ready. If your imapatient, run this script again in 10 minutes to check.\n";
		echo "\n\nmore details at:\n";
		echo "https://app.nanonets.com/ObjectLocalize/?appId=".$model_id."\n";
	}
	else{
		echo "NEXT RUN: php ./code/prediction.php ./images/videoplayback0051.jpg";
	}
}

?>