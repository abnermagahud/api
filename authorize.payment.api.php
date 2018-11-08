<?php
/**
 * 
 */
class AuthorizePayment{

	// API endpoint
	public $endpoint;


	//API environment. You can change the value to 'sandbox' or 'production'
	public $environment = "sandbox";


	//Customer Key
	public $customer_key;

	public function __construct($customerKey)
	{
		if($this->environment == "production")
		{
			$this->endpoint = "https://coastal-api.com/alc/api/v1";
		}
		else
		{
			$this->endpoint = "https://coastal-api.com/alc/apitest/v1";
		}

		$this->customer_key =  $customerKey;
	}

	/**
	 * Charge a Credit Card - Use this method to authorize and capture a credit card payment.
	 * @param  array $params 	[description]
	 * @return json         	Returns a json object information
	 */
	public function chargeCreditCard($params)
	{
		if(!is_array($params))
		{
			throw new Exception("Parameters must be array");
		}

		return $this->sendRequest('payment/chargecreditcard',$params);
	}

	/**
	 * Authorize a Credit Card - Use this method to authorize a credit card payment. To actually charge the funds you will need to follow up with a capture transaction.
	 * @param  array $params 	[description]
	 * @return json         	Returns a json object information
	 */
	public function authorizeCreditCard($params)
	{
		if(!is_array($params))
		{
			throw new Exception("Parameters must be array");
		}

		return $this->sendRequest('payment/authorizecreditcard',$params);
	}

	/**
	 * Capture a Previously Authorized Amount - Use this method to capture funds reserved with a previous authOnlyTransaction transaction request.
	 * @param  array $params 	[description]
	 * @return json         	Returns a json object information
	 */
	public function capturePreviouslyAuthorizedAmount($params)
	{
		if(!is_array($params))
		{
			throw new Exception("Parameters must be array");
		}

		return $this->sendRequest('payment/capturepreviouslyauthorizedamount',$params);
	}

	/**
	 * Debit a Bank Account - Use this method to process an ACH debit transaction using bank account details.
	 * @param  array $params [description]
	 * @return json         	Returns a json object information
	 */
	public function debitBankAccount($params)
	{
		if(!is_array($params))
		{
			throw new Exception("Parameters must be array");
		}

		return $this->sendRequest('payment/debitbankaccount',$params);
	}

	/**
	 * Charge a Customer Profile - Use this method to authorize and capture a payment using a stored customer payment profile. 
	 * @param  array $params 	[description]
	 * @return json         	Returns a json object information
	 */
	public function chargeCustomerProfile($params)
	{
		if(!is_array($params))
		{
			throw new Exception("Parameters must be array");
		}

		return $this->sendRequest('payment/chargecustomerprofile',$params);
	}

	/**
	 * Create Customer Credit Card Payment Profile - Use this function to create a new credit card customer payment profile for an existing customer profile.
	 * @param  array $params 	[description]
	 * @return json         	Returns a json object information
	 */
	public function createCustomerCreditCardPaymentProfile($params)
	{
		if(!is_array($params))
		{
			throw new Exception("Parameters must be array");
		}

		return $this->sendRequest('customer/createcustomercreditcardpaymentprofile',$params);
	}

	/**
	 * Create Customer Credit Card Payment Profile - Use this function to create a new bank account customer payment profile for an existing customer profile.
	 * @param  array $params 	[description]
	 * @return json         	Returns a json object information
	 */
	public function createCustomerCheckPaymentProfile($params)
	{
		if(!is_array($params))
		{
			throw new Exception("Parameters must be array");
		}

		return $this->sendRequest('customer/createcustomercheckpaymentprofile',$params);
	}

	/**
	 * Retrieve Customer's Credit Cards
	 * @param  array $params 	[description]
	 * @return json         	Returns a json object information
	 */
	public function getCreditCards($params)
	{
		if(!is_array($params))
		{
			throw new Exception("Parameters must be array");
		}

		return $this->sendRequest('customer/getcreditcards',$params);
	}

	/**
	 * Retrieve Customer's Bank Accounts
	 * @param  [type] $params [description]
	 * @return json         	Returns a json object information
	 */
	public function getBankAccounts($params)
	{
		if(!is_array($params))
		{
			throw new Exception("Parameters must be array");
		}

		return $this->sendRequest('customer/getbankaccounts',$params);
	}

	/**
	 * Sending request to the Server 
	 * @param  string $method 	Method to request
	 * @param  array $params 	Parameters
	 * @return json         	Returns a json object information
	 */
	public function sendRequest($method,$params)
	{
		$url = $this->endpoint.'/'.$method;

		$params['customerKey'] = $this->customer_key;

		//open connection
		$ch = curl_init();

		//set the url, number of POST vars, POST data
		curl_setopt($ch,CURLOPT_URL, $url);
		curl_setopt($ch,CURLOPT_POST, count($params));
		curl_setopt($ch,CURLOPT_POSTFIELDS, http_build_query($params));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch,CURLOPT_CONNECTTIMEOUT ,3);
		curl_setopt($ch,CURLOPT_TIMEOUT, 20);

		//execute post
		$result = curl_exec($ch);

		//close connection
		curl_close($ch);

		return $result;
	}


	/**
	 * Convert JSON data into array
	 * @param  string $json 	JSON data
	 * @return array
	 */
	public function convertJsonToArray($json)
	{
		return json_decode($json, TRUE);
	}
}
?>