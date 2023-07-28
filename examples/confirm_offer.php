<?php

use Dream\Apply\Client\Client;

$client = new Client(
    'https://instance.dreamapply.com/api/',
    'abcdefghijklmnopqrstuvwxyz123456'
);

$client->applications[1]->offers[1]->confirm();
