<?php
session_start();
require_once 'vendor/autoload.php';
include("backend/functions.php");

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
$key = $_ENV['stripe_key'];
$tier = $_POST['tier'];

\Stripe\Stripe::setApiKey($key);
header('Content-Type: application/json');

$YOUR_DOMAIN = 'http://localhost:80/web-centric';

$get_subscriptions = \Stripe\Price::all();

foreach($get_subscriptions['data'] as $price){
    if($price['unit_amount'] == 4500 && $tier == 'high'){
        $price_id = $price['id'];
    }
    if($price['unit_amount'] == 3000 && $tier == 'mid'){
        $price_id = $price['id'];
    }
    if($price['unit_amount'] == 1500 && $tier == 'low'){
        $price_id = $price['id'];
    }
}

$user = get_user_profile($_SESSION['user_id']);

$checkout_session = \Stripe\Checkout\Session::create([
    'line_items' => [[
        'price' => $price_id,
        'quantity' => 1,
    ]],
    'mode' => 'subscription',
    'success_url' => $YOUR_DOMAIN . '/success.php',
    'cancel_url' => $YOUR_DOMAIN . '/cancelled.php',
    'customer_email' => $user['email']
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);

?>