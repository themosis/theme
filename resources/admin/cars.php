<?php

$cars = PostType::make('jl_cars', 'Cars', 'Car')->set();

Metabox::make('Info', $cars->get('name'))->set(array(
    Field::text('serial')
));

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