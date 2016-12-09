<?php

$options = [[
    'Red',
    'Green',
    'Blue',
    'Brown',
    'Purple'
]];

echo Form::select('colours', $options);

$options = [
    [
        'Red',
        'Blue',
        'Green'
    ],
    [
        'Brown',
        'Purple'
    ]
];

echo Form::select('colors', $options);

$options = [
    [
        'red' => 'Red',
        'green' => 'Green',
        'blue' => 'Blue'
    ],
    [
        'brown' => 'Brown',
        'purple' => 'Purple'
    ]
];

echo Form::select('colors_2', $options);

$options = [
    'Europe' => [
        'be' => 'Belgium',
        'fr' => 'France'
    ],
    'America' => [
        'ca' => 'Canada',
        'us' => 'United States of America',
        'xy' => 'Belgium'
    ],
    'Asia' => [
        'ch' => 'China',
        'jp' => 'Japan'
    ]
];

echo Form::select('countries', $options);

$options = [
    'Europe' => [
        'Belgium',
        'France'
    ],
    'America' => [
        'Canada',
        'USA',
        'Belgium'
    ],
    'Asia' => [
        'China',
        'Japan'
    ]
];

echo Form::select('countries_2', $options);