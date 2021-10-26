<?php

$client = new Dream\DreamApply\Client\Client(
    'https://instance.dreamapply.com/api/',
    'abcdefghijklmnopqrstuvwxyz123456'
);

// create a flag
$newFlag = $client->applications->flags->create('flag name');

// add the new flag to the application with id = 1
$flagAssoc = $client->applications[1]->flags->add($newFlag);
