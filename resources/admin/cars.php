<?php

$cars = PostType::make('jl_cars', 'Cars', 'Car')->set([
    'rewrite'   => [
        'slug'  => 'cars'
    ]
]);

Metabox::make('Info', $cars->get('name'))->set([
    Field::text('serial', [], ['required']),
    Field::password('code', ['title' => 'Car password'], ['data-transition' => 0.5]),
    Field::number('amount', ['info' => 'How many cars do you have?']),
    Field::date('purchase_date', ['title' => 'Date of purchase'], ['required']),
    Field::textarea('details', ['title' => 'Car description'], ['class' => 'my-textarea-class', 'id' => 'special-id']),
    Field::radio('material', 'leather'),
    Field::radio('paint', ['red', 'blue', 'green']),
    Field::checkbox('toggle', 'activer'),
    Field::checkbox('enable', ['on' => 'enable'], ['title' => 'Accept conditions'], ['required']),
    Field::checkbox('features', ['cuir', 'carbone', 'sans-fil'], ['title' => 'Options'])
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