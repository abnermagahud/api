# API

## Charge a Credit Card 
### Use this method to authorize and capture a credit card payment.

	<?php

		require_once('authorize.payment.api.php');

		$customerKey = '<customer key>';
		$authorize = new AuthorizePayment($customerKey);

		$params = array(
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

		print_r($results);
	?>

## Authorize a Credit Card 
### Use this method to authorize a credit card payment. To actually charge the funds you will need to follow up with a capture transaction.

	<?php

		require_once('authorize.payment.api.php');

		$customerKey = '<customer key>';
		$authorize = new AuthorizePayment($customerKey);

		$params = array(
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


		$results = $authorize->authorizeCreditCard($params);

		print_r($results);
	?>


## Capture a Previously Authorized Amount 
### Use this method to capture funds reserved with a previous authOnlyTransaction transaction request.

	<?php

		require_once('authorize.payment.api.php');

		$customerKey = '<customer key>';
		$authorize = new AuthorizePayment($customerKey);

		$params = array(
			'transactionID' => '<transaction id>',
			'amount'=>'5.00',
		);


		$results = $authorize->capturePreviouslyAuthorizedAmount($params);

		print_r($results);
	?>

## Debit a Bank Account
### Use this method to process an ACH debit transaction using bank account details.

	<?php

		require_once('authorize.payment.api.php');

		$customerKey = '<customer key>';
		$authorize = new AuthorizePayment($customerKey);

		$params = array(
			'accountType' => 'checking',//checking, savings, or businessChecking
			'routingNumber' => '122000661',
			'accountNumber' => '12312312444',
			'fullName'=>'Test Full Name',
			'bankName' => 'Test Bank Name',
			'invoiceNumber' => time(),
			'description'=>'this is a test',
			'transactionType'=>'authCaptureTransaction',//authCaptureTransaction, authOnlyTransaction
			'amount'=>1.00,
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
			'phoneNumber'=>'09498811086',
			'email'=>'abnermagahud@gmail.com'
		);



		$results = $authorize->debitBankAccount($params);

		print_r($results);
	?>

## Charge a Customer Profile
### Use this method to authorize and capture a payment using a stored customer payment profile. 

	<?php

		require_once('authorize.payment.api.php');

		$customerKey = '<customer key>';
		$authorize = new AuthorizePayment($customerKey);

		$params = array(
			'passengerID' => '<passenger id>',
			'paymentProfileID'=>'<payment profile id>',
			'transactionType'=>'authOnlyTransaction',//authOnlyTransaction, authCaptureTransaction
			'amount'=>1.00
		);



		$results = $authorize->chargeCustomerProfile($params);

		print_r($results);
	?>

## Create Customer Credit Card Payment Profile
### Use this function to create a new credit card customer payment profile for an existing customer profile.

	<?php

		require_once('authorize.payment.api.php');

		$customerKey = '<customer key>';
		$authorize = new AuthorizePayment($customerKey);

		$params = array(
			'passengerID'=>'<passenger id>',
			'cardNumber' => '<card number>',
			'expirationDate' => '2019-12',
			'cvv' => '123',
			'firstName' => 'Abner',
			'lastName' => 'Magahud',
			'company'=>'test Company',
			'address'=>'Guanzon Street',
			'city'=>'kabankalan City',
			'state'=>'Negros Occidetal',
			'zip'=>'6111',
			'country'=>'PHL',
			'phoneNumber'=>'982121739'

		);


		$results = $authorize->createCustomerCreditCardPaymentProfile($params);

		print_r($results);
	?>

## Create Customer Credit Card Payment Profile
### Use this function to create a new bank account customer payment profile for an existing customer profile.

	<?php

		require_once('authorize.payment.api.php');

		$customerKey = '<customer key>';
		$authorize = new AuthorizePayment($customerKey);

		$params = array(
			'passengerID'=>'<passenger id>',
			'accountNumber' => '<account number>',
			'accountName' => 'Abner test',
			'bankName' => 'test bank',
			'routingNumber' => '122000661',
			'accountType'=>'checking',//checking,savings,businessChecking
			'firstName'=>'Abner',
			'lastName' => 'Magahud',
			'company'=>'test Company',
			'address'=>'Guanzon Street',
			'city'=>'kabankalan City',
			'state'=>'Negros Occidetal',
			'zip'=>'6111',
			'country'=>'PHL',
			'phoneNumber'=>'982121739',
			'faxNumber'=>''
		);


		$results = $authorize->createCustomerCheckPaymentProfile($params);

		print_r($results);
	?>

## Retrieve Customer's Credit Cards

	<?php

		require_once('authorize.payment.api.php');

		$customerKey = '<customer key>';
		$authorize = new AuthorizePayment($customerKey);

		$params = $fields = array(
			'passengerID'=>'<passenger id>'
		);


		$results = $authorize->getCreditCards($params);

		print_r($results);
	?>

## Retrieve Customer's Bank Accounts

	<?php

		require_once('authorize.payment.api.php');

		$customerKey = '<customer key>';
		$authorize = new AuthorizePayment($customerKey);

		$params = $fields = array(
			'passengerID'=>'<passenger id>'
		);


		$results = $authorize->getBankAccounts($params);

		print_r($results);
	?>
