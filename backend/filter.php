<?php
include "functions.php";
require '../vendor/autoload.php';

use Opis\JsonSchema\{
    Validator,
    ValidationResult,
    Errors\ErrorFormatter,
};

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $json = file_get_contents('php://input');

    $validation_data = json_decode($json);  //get the post data for validationn
    $data = json_decode($json, true);       //get the post data as associative array for filter_jobs()

    $json_schema = json_decode(file_get_contents("filter_schema.json"));    //fetch and decode the schema from file

    $validator = new Validator();
    $result = $validator->validate($validation_data, $json_schema); //validate stuff

    if ($result->isValid()) {
        // echo "hi";
        echo filter_jobs($data);
    } else {
        foreach ($result->getErrors() as $error) {
            echo "Error at: " . $error->dataPointer() . "\n";
            echo "Message: " . $error->keyword() . " - " . $error->keywordArgs()['message'] ?? 'Validation error' . "\n\n";
        }
    }
}
?>
