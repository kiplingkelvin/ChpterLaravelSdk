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
