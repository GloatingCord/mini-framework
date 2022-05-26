<?php

use Main\Middleware\Headers;

$header = new Headers;

return [
    'middleware' => [
        \Main\Middleware\Headers::class,
    ],
];
