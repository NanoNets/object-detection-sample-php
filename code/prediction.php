<?php
require_once './src/Unirest.php';
$api_key = getenv('NANONETS_API_KEY');
$model_id = getenv('NANONETS_MODEL_ID');
$url = 'https://app.nanonets.com/api/v2/ObjectDetection/Model/'. $model_id . '/LabelFile/';
$image_path = $argv[1];

echo $image_path."\n";

$data = array(
    "modelId" => $model_id
);
$files = array('file'=>$image_path);

$body = Unirest\Request\Body::multipart($data, $files);
$headers = array();
$result = Unirest\Request::post($url, $headers, $body, $api_key, '');
if ($result === FALSE) {
    echo "Some Error in API";
}
else{
    print_r(json_decode($result->raw_body, True)['result']);
}

?>