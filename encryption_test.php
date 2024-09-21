<?php 
//Define cipher 
$cipher = "aes-256-cbc"; 
// $encryption_key = openssl_random_pseudo_bytes(32);
$encryption_key = "440502b5b4e50cff6f842f46d86b50e9e6e632a295f3c27635ad304ca191b6c5";
// echo $encryption_key;
// var_dump(bin2hex($encryption_key));

//Generate an initialization vector 
$iv_size = openssl_cipher_iv_length($cipher); 
$iv = openssl_random_pseudo_bytes($iv_size); 

//Data to encrypt 
$data = "Sample Text this is what we came for"; 
$encrypted_data = openssl_encrypt($data, $cipher, $encryption_key, 0, $iv); 

echo uniqid();
?>