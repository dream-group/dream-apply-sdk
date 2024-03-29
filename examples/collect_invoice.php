<?php

use Dream\Apply\Client\Client;
use Dream\Apply\Client\CreatableModels\Transaction;

$client = new Client(
    'https://instance.dreamapply.com/api/',
    'abcdefghijklmnopqrstuvwxyz123456'
);

// collect some amount for invoice with id = 3
$client->invoices[3]->transactions->create(
    (new Transaction())
        ->setAmount('1050.20')  // amount in decimal form
        ->setCurrency('EUR')    // currency, must be same as the currency value of the invoice
);
