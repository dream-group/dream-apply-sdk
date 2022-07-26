<?php

$client = new Dream\Apply\Client\Client(
    'https://instance.dreamapply.com/api/',
    'abcdefghijklmnopqrstuvwxyz123456'
);

// Creating a new score on a scorsheet is the same thing as ppending an
// application to a scoresheet. The result is a new "score" record that
// binds together a scoresheet and an application.

// Add application ID:321 to scoresheet ID:123 with an initial score of 12
$client->scoresheets[123]->scores->create(321, 12, 'Did very well!');

// Add application ID:321 to scoresheet ID:123 with an initial score of 0 and no comments
$client->scoresheets[123]->scores->create(321, 0);
