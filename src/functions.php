<?php
function chpter_renew_account_token()
{
    return Kipling\ChpterPhpSdk\Chpter::accountsTokenRenewal();
}

function chpter_mpesa_payment($customer, $products, $amount, $callback_details)
{
    return KiplingKelvin\ChpterLaravelSdk\Chpter::mpesaPayment($customer, $products, $amount, $callback_details);
}

function chpter_card_payment($customer, $products, $amount,$card_details, $callback_details)
{
    return KiplingKelvin\ChpterLaravelSdk\Chpter::cardPayment($customer, $products, $amount,$card_details, $callback_details);
}
function chpter_hosted_redirect_payment($customer, $amount, $redirect_urls)
{
    return Kipling\ChpterPhpSdk\Chpter::hostedRedirectPayment($customer, $amount, $redirect_urls);
}

function chpter_express_redirect_payment($transaction_data, $redirect_urls)
{
    return Kipling\ChpterPhpSdk\Chpter::expressRedirectPayment($transaction_data, $redirect_urls);
}
