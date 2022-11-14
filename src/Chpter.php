<?php

namespace KiplingKelvin\ChpterLaravelSdk;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;

class Chpter 
{
    public $chpter_payment_url;
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
         $this->chpter_payment_url = config('chpter.payments_url'); 	
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

    public function cardPayment($customer, $products, $amount, $card_details, $callback_details)
    {

        $client  = new Client();
        
        $requestBody = array( 
            "customer_details"=> $customer,
            "products"=> $products,
            "amount"=> $amount,
            "card_details"=> $card_details,
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

}
