<?php

return [

    /*-----------------------------------------
    |Chpter payments URL
    |------------------------------------------
    */
    'payment_url' => 'https://chpter.co/api/payment/payment-initiate-callback/',

    /*-----------------------------------------
    |Chpter payment redirect URLs
    |------------------------------------------
    */
    'hosted_redirect_payment_url' => 'https://chpter.co/checkout.sessions/hosted/redirect/session',
    'express_redirect_payment_url' => 'https://chpter.co/checkout.sessions/express/redirect/session',

    /*-----------------------------------------
    |Chpter accounts URLs
    |------------------------------------------
    */
    'accounts_token_renewal_url' => 'https://chpter.co/api/accounts/renew_merchant_token/',

    /*-----------------------------------------
    |Chpter payout URLs
    |------------------------------------------
    */
    'mobile_payout_destination_url' => 'https://chpter.co/api/payout/payout-mobile-destination',
    'bank_payout_destination_url' => 'https://chpter.co/api/payout/payout-bank-destination',

    'mobile_payout_url' => 'https://chpter.co/api/payout/payout-mobile-destination',
    'bank_payout_url' => 'https://chpter.co/api/payout/payout-bank-destination',

    /*-----------------------------------------
    |Your Domain Registered Under Chpter
    |------------------------------------------
    */
    'domain'   => getenv("CLIENT_DOMAIN"),

    /*-----------------------------------------
    |Your Chpter Token
    |------------------------------------------
    */
    'chpter_token' => getenv("CHPTER_TOKEN"),

];
