<?php

namespace KiplingKelvin\ChpterLaravelSdk;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;

class Payouts
{
    public $mobile_payout_destination_url;
    public $bank_payout_destination_url;
    public $mobile_payout_url;
    public $bank_payout_url;
    public $token;
    public $domain;

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
         $this->mobile_payout_destination_url = config('chpter.mobile_payout_destination_url'); 	
         $this->bank_payout_destination_url = config('chpter.bank_payout_destination_url'); 
         $this->mobile_payout_url = config('chpter.mobile_payout_url'); 
         $this->bank_payout_url = config('chpter.bank_payout_url'); 
         $this->token = config('chpter.chpter_token'); 
         $this->domain =config('chpter.domain');
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
  
    public static function mobilePayouts($customer, $products, $amount, $callback_details)
    {
        return $customer;
    }

    public static function domesticBanksPayouts($customer, $products, $amount, $callback_details)
    {
        return $customer;
    }

  
}
