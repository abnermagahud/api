<?php

require_once('authorize.payment.api.php');

$customerKey = '<customer key>';
$authorize = new AuthorizePayment($customerKey);

echo $authorize->sandbox(true);

/*$params = array(
	'cardNumber' => '6011000000000012',
	'expirationDate' => '2019-12',
	'cvv' => '123',
	'amount'=>'5.00',
	'invoiceNumber' => time(),
	'description' => 'this is a test',
	'passengerID'=>'1213',
	'tripNumber'=>'2121',
	'firstName' => 'Abner',
	'lastName' => 'Magahud',
	'company'=>'test Company',
	'address'=>'Guanzon Street',
	'city'=>'kabankalan City',
	'state'=>'Negros Occidetal',
	'zip'=>'6111',
	'country'=>'PHL',
	'email'=>'abnermagahud@gmail.com'
);


$results = $authorize->chargeCreditCard($params);

print_r($results);*/
?>