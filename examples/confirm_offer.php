<?php

$client = new Dream\DreamApply\Client\Client(
    'https://instance.dreamapply.com/api/',
    'abcdefghijklmnopqrstuvwxyz123456'
);

$client->applications[1]->offers[1]->confirm();
