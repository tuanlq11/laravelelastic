<?php

return [
    'connection' => [
        'host'    => '127.0.0.1:9200',
        'retries' => env('ELASTIC_RETRIES', 2),
    ],
];