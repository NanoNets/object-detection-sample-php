<?php
require_once './src/Unirest.php';
function endsWith($haystack, $needle)
{
    $length = strlen($needle);

    return $length === 0 || 
    (substr($haystack, -$length) === $needle);
}

$path_to_annotations = "./annotations/json";
$path_to_images = "./images";

$model_id = getenv('NANONETS_MODEL_ID');
$api_key = getenv('NANONETS_API_KEY');

$url = 'https://app.nanonets.com/api/v2/ObjectDetection/Model/'.$model_id.'/UploadFile/';

foreach (scandir($path_to_annotations) as $file){
    if (endsWith($file, '.json')){
        $annotation = json_decode(fgets(fopen($path_to_annotations.'/'.$file, 'r')));
        list($filename, $ext) = explode('.', $file);
        $image_path = $path_to_images.'/'.$filename.'.jpg';
        $data = array(
            'data' => json_encode(array(array(
                    "filename"=> $image_path,
                    "object" => $annotation
            ))),
            'modelId' => $model_id
        );
        $files = array('file'=>$image_path);
        $body = Unirest\Request\Body::multipart($data, $files);
        $headers = array();
        $result = Unirest\Request::post($url, $headers, $body, $api_key, '');
        if ($result === FALSE) {
            echo "Some Error in Upload\n";
        }
        else{
            print_r(json_decode($result->raw_body, True)['result']);
        }
    }
}

echo "\n\n\nNEXT RUN: php ./code/train-model.php\n"
?>