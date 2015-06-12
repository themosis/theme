<?php

$cars = PostType::make('jl_cars', 'Cars', 'Car')->set();

Metabox::make('Info', $cars->get('name'))->set(array(
    Field::text('serial')
));

// Post statuses
$cars->status(['rent', 'sold']);
/*$cars->status([
    'rent' => [
        'label' => 'Rental'
    ],
    'sold' => [
        'label' => 'To Sell'
    ]
]);*/