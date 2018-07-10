<?php

$url = 'https://app.nanonets.com/api/v2/ObjectDetection/Model/';
$api_key = getenv('NANONETS_API_KEY');

$payload = json_encode(array('categories' => array('TieFighter', 'MillenniumFalcon')));

$context = stream_context_create(array(
    'http' => array(
        'header' => "Authorization: Basic " . base64_encode("$api_key:"). "\r\n".
        'Accept: application/json'."\r\n".
        'Content-Type: application/json'."\r\n",
        'method' => 'POST',
        'content' => $payload,
    ),
));
$result = file_get_contents($url, false, $context);
if ($result === FALSE) {
    echo "Please Check Your API Key. Make sure you have run : export NANONETS_API_KEY=YOUR_API_KEY_GOES_HERE \n";
}
else{
    $model_id = json_decode($result)->model_id;
    echo "\n\nNEXT RUN: export NANONETS_MODEL_ID=".$model_id;
    echo "\nTHEN RUN: php ./code/upload-training.php  \n";
    echo "\n";
}

?>
