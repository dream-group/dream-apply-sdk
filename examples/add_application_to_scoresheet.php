<?php

use Dream\Apply\Client\Client;
use Dream\Apply\Client\CreatableModels\Score;

$client = new Client(
    'https://instance.dreamapply.com/api/',
    'abcdefghijklmnopqrstuvwxyz123456'
);

// Creating a new score on a scorsheet is the same thing as ppending an
// application to a scoresheet. The result is a new "score" record that
// binds together a scoresheet and an application.

// Add application ID:321 to scoresheet ID:123 with an initial score of 12
$client->scoresheets[123]->scores->create(new Score([
    'application' => 321,
    'points' => 12,
    'comments' => 'Did very well!',
]));

// Add application ID:321 to scoresheet ID:123 with an initial score of 0 and no comments
$client->scoresheets[123]->scores->create(new Score([
    'application' => 321,
    'points' => 0,
]));
