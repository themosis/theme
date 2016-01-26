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
    Field::checkbox('features', ['cuir', 'carbone', 'sans-fil'], ['title' => 'Options']),
    Field::select('manufacturer', [
        'Europe' => [
            'Audi',
            'BMW',
            'VW'
        ],
        'Asia' => [
            'Honda',
            'Mazda',
            'Toyota'
        ]
    ]),
    Field::select('manus', [
        'Europe' => [
            'audi'  => 'Audi',
            'bm'    => 'BMW',
            'volks' => 'VW'
        ],
        'Asia' => [
            'jane'  => 'Honda',
            'kyle'  => 'Mazda',
            'nipon' => 'Toyota'
        ]
    ]),
    Field::select('manufacturers', [
        'Europe' => [
            'audi'  => [
                'text'  => 'Audi',
                'atts'  => [
                    'class' => 'prout'
                ]
            ],
            'bm'    => 'BMW',
            'volks' => 'VW'
        ],
        'Asia' => [
            'jane'  => 'Honda',
            'kyle'  => 'Mazda',
            'nipon' => 'Toyota'
        ]
    ], ['title' => 'Fabricants'], ['multiple']),
    Field::media('pic', ['title' => 'Car cover']),
    Field::editor('full_desc', ['title' => 'Description', 'info' => 'Write the car description.']),
    Field::collection('gallery', ['limit' => 3]),
    Field::color('paint_picker', [], ['class' => 'prout', 'required', 'data-view' => 'something']),
    Field::infinite('collection', [
        Field::text('author'),
        Field::textarea('desc'),
        Field::media('avatar', ['info' => 'Insert a picture']),
        Field::checkbox('activate', 'Toggle'),
        Field::select('style', [
            ['berline', 'coupe', '4-wheel']
        ])
    ])
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