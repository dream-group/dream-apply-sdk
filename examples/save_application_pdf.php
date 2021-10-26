<?php

$client = new Dream\DreamApply\Client\Client(
    'https://instance.dreamapply.com/api/',
    'abcdefghijklmnopqrstuvwxyz123456'
);

// get pdf record for the application with id = 2
$pdf = $client->applications[2]->pdf;

// write it to a file
file_put_contents('test.pdf', $pdf->content->getContents());
