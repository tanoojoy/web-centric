<?php
require 'vendor/autoload.php';
use Opis\JsonSchema\Validator;
include "functions.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $json = file_get_contents('php://input');

    $validation_data = json_decode($json);
    $data = json_decode($json, true);

    // $json_schema_json = file_get_contents("filter_schema.json");
    // $json_schema = json_decode($json_schema_json);

    // if (json_last_error() !== JSON_ERROR_NONE) {
    //     echo "Schema JSON decoding error: " . json_last_error_msg();
    //     exit;
    // }

    // // Log the raw JSON schema string instead of object
    // file_put_contents("backend/error_log.txt", $json_schema_json);

    // $validator = new Validator();
    // $result = $validator->validate($validation_data, $json_schema);

    // if ($result->isValid()) {
    //     echo filter_jobs($data);
    // } else {
    //     $formatter = new ErrorFormatter();
    //     $errors = $formatter->format($result->getErrors());
    //     echo "Invalid JSON filter received.\n";
    //     print_r($errors);
    // }
}
?>

