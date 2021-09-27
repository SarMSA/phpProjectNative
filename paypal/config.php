<?php
require 'vendor/autoload.php';

 
use Omnipay\Omnipay;
 
define('CLIENT_ID', 'ARJ02b1r7w9z9g9xBlNwKlsHExiI1sbdFvKs8FwpNgnGU_j7Njt7yeLQeWYm8JDLvnnYYUTJQs2DZLnR');
define('CLIENT_SECRET', 'ED64GJmXKV-34cq-LSiT036x5lV17V1wyOvd25TXTnl7M-ErjJaEn2AQcz1ew5vKK7PubExWbwEBlysB');
 
define('PAYPAL_RETURN_URL', 'http://localhost/phpProject/paypal/success.php');
define('PAYPAL_CANCEL_URL', 'http://localhost/phpProject/paypal/cancel.php');
define('PAYPAL_CURRENCY', 'USD'); // set your currency here
 
// Connect with the database
$db = new mysqli('localhost', 'root', '', 'shopping'); 
 
if ($db->connect_errno) {
    die("Connect failed: ". $db->connect_error);
}
 
$gateway = Omnipay::create('PayPal_Rest');
$gateway->setClientId(CLIENT_ID);
$gateway->setSecret(CLIENT_SECRET);
$gateway->setTestMode(true); //set it to 'false' when go live
