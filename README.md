# Chpter API PHP Integration

## Installation
Install via composer
```cmd
composer require kiplingkelvin/chpter-laravel-sdk
```
   
Run vendor:publish command

```bash
php artisan vendor:publish --provider="KiplingKelvin\ChpterLaravelSdk\ChpterServiceProvider"
```
After publishing you will find config/chpter.php config file. You can now adjust the configurations appropriately. Additionally, add the configurations to your env for security purposes.

Add the following files to your .env
```env
CLIENT_DOMAIN=
CHPTER_TOKEN=

eg.

CLIENT_DOMAIN=chpter.co
CHPTER_TOKEN=chpter_pk_2b4037c1c8

```

## Usage
## Payments
### Mpesa Payment with STK Push 

```php
        $chpter= new \KiplingKelvin\ChpterLaravelSdk\Chpter();

        $customer = array( 
            "payment_method"=> "MPesa",
            "full_name"=> "John Doe",
            "location"=> "Nairobi",
            "phone_number"=> "254700123123",
            "email"=> "johndoe@mail.com"  );

        $products = array(  array( 
                "product_id"=> "08",
                "product_name"=> "HoodEez",
                "quantity"=> "1",
                "unit_price"=> "1" ));

        $amount = array( 
                "delivery_fee"=> "0",
                "discount_fee"=> "0",
                "total"=> "1",
                "currency"=> "kes");

        $callback_details = array( 
                "transaction_reference"=>  "123456789123",
                "callback_url"=>  "https://df02-197-232-140-206.in.ngrok.io/api/chpter_mpesa_payment_callback_url" );

        $response = $chpter->mpesaPayment($customer, $products, $amount, $callback_details);

        //Response Is in json
        return $response;
```

### Card Payment
```php

        $chpter= new \KiplingKelvin\ChpterLaravelSdk\Chpter();

        $customer = array( 
            "payment_method"=> "Card",
            "full_name"=> "John Doe",
            "location"=> "Nairobi",
            "phone_number"=> "254706347307",
            "email"=> "johndoe@mail.com"  );

        $products = array(  array( 
                "product_id"=> "08",
                "product_name"=> "HoodEez",
                "quantity"=> "1",
                "unit_price"=> "1" ));

        $amount = array( 
                "delivery_fee"=> "0",
                "discount_fee"=> "0",
                "total"=> "1",
                "currency"=> "kes");

        $card_details = array( 
            "card_number"=> "4545454545454545",
            "expiry_month"=> "08",
            "expiry_year"=> "2024",
            "cvc"=> "123");

        $callback_details = array( 
                "transaction_reference"=>  "123456789123",
                "callback_url"=>  "https://df02-197-232-140-206.in.ngrok.io/api/chpter_mpesa_payment_callback_url" );

        
        Log::info('********Starting Card Api Request**********');
        $response = $chpter->cardPayment($customer, $products, $amount, $card_details, $callback_details);

        //The response is in json
        Log::alert('Chpter Card API Response');
        return $response;

```
