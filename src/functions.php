<?php

function chpter_mpesa_payment($customer, $products, $amount, $callback_details)
{
    return KiplingKelvin\ChpterLaravelSdk\Chpter::mpesaPayment($customer, $products, $amount, $callback_details);
}

function chpter_card_payment($customer, $products, $amount,$card_details, $callback_details)
{
    return KiplingKelvin\ChpterLaravelSdk\Chpter::cardPayment($customer, $products, $amount,$card_details, $callback_details);
}

// function chpter_mobile_payouts($customer, $products, $amount, $callback_details)
// {
//     return Kipling\ChpterPhpSdk\Chpter::mobilePayouts($customer, $products, $amount, $callback_details);
// }

// function chpter_domestic_banks_payouts($customer, $products, $amount,$card_details, $callback_details)
// {
//     return Kipling\ChpterPhpSdk\Chpter::domesticBanksPayouts($customer, $products, $amount,$card_details, $callback_details);
// }
