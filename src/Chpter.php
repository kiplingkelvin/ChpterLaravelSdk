<?php

namespace KiplingKelvin\ChpterLaravelSdk;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;

class Chpter 
{
    public $chpter_payment_url;
    public $chpter_hosted_redirect_payment_url;
    public $chpter_express_redirect_payment_url;

    public $chpter_accounts_token_renewal_url;
    public $token;
    public $domain;


    public $mobile_payout_destination_url;
    public $bank_payout_destination_url;
    public $mobile_payout_url;
    public $bank_payout_url;
  
    /**
     * Construct method
     *
     * Initializes the class with an array of API values.
     *
     * @param array $config
     * @return void
     * @throws exception if the values array is not valid
     */



    public function __construct()
    {
        //Base URL for the API endpoints. This is basically the 'common' part of the API endpoints
         $this->chpter_payment_url = config('chpter.payment_url'); 	
         $this->chpter_hosted_redirect_payment_url = config('chpter.hosted_redirect_payment_url'); 
         $this->chpter_express_redirect_payment_url = config('chpter.express_redirect_payment_url'); 
         $this->chpter_accounts_token_renewal_url = config('chpter.accounts_token_renewal_url'); 

         $this->mobile_payout_destination_url = config('chpter.mobile_payout_destination_url'); 	
         $this->bank_payout_destination_url = config('chpter.bank_payout_destination_url'); 
         $this->mobile_payout_url = config('chpter.mobile_payout_url'); 
         $this->bank_payout_url = config('chpter.bank_payout_url'); 

         $this->token = config('chpter.chpter_token'); 
         $this->domain =config('chpter.domain');
    }


    public function mpesaPayment($customer, $products, $amount, $callback_details)
    {

        $client  = new Client();

        $requestBody = array( 
            "customer_details"=> $customer,
            "products"=> $products,
            "amount"=> $amount,
            "callback_details"=> $callback_details,
        );

        try {
            $response = $client->post($this->chpter_payment_url, [
                "headers" => [
                    "Authorization" => "Token {$this->token}",
                    "domain"  => $this->domain,
                ],
                "json"    => $requestBody,
            ]);

            return json_decode((string) $response->getBody(), true);
        } catch (BadResponseException $exception) {
            return json_decode((string) $exception->getResponse()->getBody()->getContents(), true);
        }

    }

    public function hostedRedirectPayment($customer, $amount, $redirect_urls)
    {

        $client  = new Client();
        
        $requestBody = array( 
            "customer_details"=> $customer,
            "amount"=> $amount,
            "redirect_urls"=> $redirect_urls,
        );

        try {
            $response = $client->post($this->chpter_hosted_redirect_payment_url, [
                "headers" => [
                    "Authorization" => "Token {$this->token}",
                    "domain"  => $this->domain,
                ],
                "json"    => $requestBody,
            ]);

            return json_decode((string) $response->getBody(), true);
        } catch (BadResponseException $exception) {
            return json_decode((string) $exception->getResponse()->getBody()->getContents(), true);
        }
    }

    public function expressRedirectPayment($transaction_data, $redirect_urls)
    {

        $client  = new Client();
        
        $requestBody = array( 
            "transaction_data"=> $transaction_data,
            "redirect_urls"=> $redirect_urls,
        );

        try {
            $response = $client->post($this->chpter_express_redirect_payment_url, [
                "headers" => [
                    "Authorization" => "Token {$this->token}",
                    "domain"  => $this->domain,
                ],
                "json"    => $requestBody,
            ]);

            return json_decode((string) $response->getBody(), true);
        } catch (BadResponseException $exception) {
            return json_decode((string) $exception->getResponse()->getBody()->getContents(), true);
        }
    }

    public function accountsTokenRenewal()
    {

        $client  = new Client();
        
        try {
            $response = $client->post($this->chpter_accounts_token_renewal_url, [
                "headers" => [
                    "Authorization" => "Token {$this->token}",
                    "domain"  => $this->domain,
                ],
                "json"    => null,
            ]);

            return json_decode((string) $response->getBody(), true);
        } catch (BadResponseException $exception) {
            return json_decode((string) $exception->getResponse()->getBody()->getContents(), true);
        }
    }

    public static function createMobilePayoutDestination($type, $phone_number)
    {
        $client  = new Client();

        $requestBody = array( 
            "type"=> $type,
            "phone_number"=> $phone_number
        );

        try {
            $response = $client->post($this->mobile_payout_destination_url, [
                "headers" => [
                    "Authorization" => "Token {$this->token}",
                    "domain"  => $this->domain,
                ],
                "json"    => $requestBody,
            ]);

            return json_decode((string) $response->getBody(), true);
        } catch (BadResponseException $exception) {
            return json_decode((string) $exception->getResponse()->getBody()->getContents(), true);
        }
    }
    public static function createBankPayoutDestination($bank_name, $bank_account_name, $bank_account_number)
    {
        $client  = new Client();

        $requestBody = array( 
            "bank_name"=> $bank_name,
            "bank_account_name"=> $bank_account_name,
            "bank_account_number"=> $bank_account_number,
        );

        try {
            $response = $client->post($this->bank_payout_destination_url, [
                "headers" => [
                    "Authorization" => "Token {$this->token}",
                    "domain"  => $this->domain,
                ],
                "json"    => $requestBody,
            ]);

            return json_decode((string) $response->getBody(), true);
        } catch (BadResponseException $exception) {
            return json_decode((string) $exception->getResponse()->getBody()->getContents(), true);
        }
    }

}
