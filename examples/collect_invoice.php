<?php

$client = new Dream\Apply\Client\Client(
    'https://instance.dreamapply.com/api/',
    'abcdefghijklmnopqrstuvwxyz123456'
);

// collect some amount for invoice with id = 3
$client->invoices[3]->transactions->create(
    '1050.20', // amount in decimal form
    'EUR'   // currency, must be same as the currency value of the invoice
);
