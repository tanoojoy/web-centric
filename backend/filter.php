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
        $errorFormatter = new ErrorFormatter();
        $errors = $errorFormatter->format($result->error());
    
        $error_messages = [];
        foreach ($errors as $key => $message) {
            array_push($error_messages, "Error at '$key': $message");
        }
    
        echo json_encode([
            "errors" => $error_messages
        ]);
        
    }
}
?>
