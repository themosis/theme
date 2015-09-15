<?php

$cars = PostType::make('jl_cars', 'Cars', 'Car')->set([
    'rewrite'   => [
        'slug'  => 'cars'
    ]
]);

Metabox::make('Info', $cars->get('name'))->set([
    Field::text('serial'),
    Field::radio('material', 'leather'),
    Field::radio('paint', ['red', 'blue', 'green']),
    Field::checkbox('toggle', 'activer'),
    Field::checkbox('enable', ['on' => 'enable']),
    Field::checkbox('features', ['cuir', 'carbone', 'sans-fil'])
]);

// Post statuses
//$cars->status(['rent', 'sold']);
$cars->status([
    'rent' => [
        'label' => 'Rental',
        'publish_text'  => 'Rent'
    ],
    'sold' => [
        'label' => 'To Sell',
        'publish_text'  => 'Sell it damn\'it'
    ]
]);