<?php

//require 'start.php';
session_start();
include('../admin/include/dbcon.php');

if(!isset($_POST['pay']))
{
	die();
}

//echo __DIR__;
$email = $_SESSION['email'];
$price = $_POST['price'];
$barang = implode(",",$_POST['orderid']);
$sname = $_POST['shipsname'];
$sadd = $_POST['shipsadd'];
$scity = $_POST['shipscity'];
$spost = $_POST['shippost'];
$contactno = $_POST['contactno'];
$sship = $_POST['shipstate'];

echo $barang."<br>";

if(isset($_POST['check']))
{
	mysqli_query($conn,"UPDATE users SET name = '$sname', billingName = '$sname', contactno = '$contactno', shippingAddress = '$sadd', shippingCity = '$scity', shippingPostcode = '$spost', shippingState = '$sship', billingAddress = '$sadd', billingCity = '$scity', billingPostcode = '$spost',billingState = '$sship' WHERE email = '$email'");
}else
{
	$bname = $_POST['billname'];
	$badd =  $_POST['billadd'];
	$bcity = $_POST['billcity'];
	$bstate = $_POST['billstate'];
	$bpost = $_POST['billpost'];
	
	mysqli_query($conn,"UPDATE users SET name = '$sname', billingName = '$bname', contactno = '$contactno', shippingAddress = '$sadd', shippingCity = '$scity', shippingPostcode = '$spost', shippingState = '$sship', billingAddress = '$badd', billingCity = '$bcity', billingPostcode = '$bpost',billingState = '$bstate' WHERE email = '$email'");
}

// 1. Autoload the SDK Package. This will include all the files and classes to your autoloader
require '../vendor/autoload.php';

// 2. Provide your Secret Key. Replace the given one with your app clientId, and Secret
// https://developer.paypal.com/webapps/developer/applications/myapps
$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential(
        'AQ0QANNutMZUY2_BDXCFTOlmRipVOl47VhXtFom3xYcRCoqoAhGw4Pzz9ggOid2g0sCXNDWAyvAElBs7',     // ClientID
        'ELo3VPq5yUHlsDgvMiNQG5g9ZPawkov5XRbikUvf0T17Fia3Z8dMD1Bn2Gx1wbCAvOMDAtnLCru88O7F'      // ClientSecret
    )
);

// 3. Lets try to create a Payment
// https://developer.paypal.com/docs/api/payments/#payment_create
$payer = new \PayPal\Api\Payer();
$payer->setPaymentMethod('paypal');

$amount = new \PayPal\Api\Amount();
$amount->setTotal($price);
$amount->setCurrency('MYR');

$transaction = new \PayPal\Api\Transaction();
$transaction->setAmount($amount);

$redirectUrls = new \PayPal\Api\RedirectUrls();
$redirectUrls->setReturnUrl("http://localhost/craftedbysoul/user/result.php?status=success&item=".$barang)
    ->setCancelUrl("http://localhost/craftedbysoul/user/result.php?status=failed");

$payment = new \PayPal\Api\Payment();
$payment->setIntent('sale')
    ->setPayer($payer)
    ->setTransactions(array($transaction))
    ->setRedirectUrls($redirectUrls);

// 4. Make a Create Call and print the values
try {
    $payment->create($apiContext);
    echo $payment;

    echo "\n\nRedirect user to approval_url: " . $payment->getApprovalLink() . "\n";
	header( "Location: ".$payment->getApprovalLink() );
}
catch (\PayPal\Exception\PayPalConnectionException $ex) {
    // This will print the detailed information on the exception.
    //REALLY HELPFUL FOR DEBUGGING
    echo $ex->getData();
}
?>