<?php

return [

    /*-----------------------------------------
    |Chpter payments URL
    |------------------------------------------
    */
    'payments_url' => 'https://chpter.co/api/payment/payment-initiate-callback/',

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
