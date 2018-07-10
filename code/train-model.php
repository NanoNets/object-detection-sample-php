<?php
$api_key = getenv('NANONETS_API_KEY');
$model_id = getenv('NANONETS_MODEL_ID');
$url = 'https://app.nanonets.com/api/v2/ObjectDetection/Model/'. $model_id . '/Train/';

$querystring = array("modelId" => $model_id);

$context = stream_context_create(array(
    'http' => array(
        'header' => "Authorization: Basic " . base64_encode("$api_key:"),
        'method' => 'POST',
        'content' => $querystring,
    ),
));
$result = file_get_contents($url, false, $context);
if ($result === FALSE) {
    echo "Some Error in API";
}
else{
    echo $result."\n";
    echo "\n\nNEXT RUN: php ./code/model-state.php\n";
}

?>