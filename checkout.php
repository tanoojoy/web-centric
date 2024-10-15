<?php

require_once 'vendor/autoload.php';
require_once 'secrets.php';

\Stripe\Stripe::setApiKey($stripeSecretKey);
header('Content-Type: application/json');

$YOUR_DOMAIN = 'http://localhost:80/web-centric';

$checkout_session = \Stripe\Checkout\Session::create([
  'line_items' => [[
    # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
    'price' => 'price_1QA3x5P8XPbs6jH8TEpLvx1F',
    'quantity' => 1,
  ]],
  'mode' => 'subscription',
  'success_url' => $YOUR_DOMAIN . '/success.php',
  'cancel_url' => $YOUR_DOMAIN . '/cancelled.php',
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);

?>