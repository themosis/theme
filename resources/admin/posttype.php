<?php

/**
 * Cars
 */
$cars = PostType::make('jl_cars', 'Cars', 'Car')->set([
    'public' => true,
    'rewrite' => [
        'slug' => 'cars'
    ]
]);

$cars->setTitle('Enter new car name...');

/**
 * Add custom statuses
 */
$cars->status([
    'for_rent',
    'rented',
    'for_sell',
    'sold'
]);

/**
 * Add custom manufacturer taxonomy
 */
Taxonomy::make('manufacturers', [$cars->get('name'), 'post'], 'Manufacturers', 'Manufacturer')->set([
    'hierarchical' => true
])->bind();

/**
 * Books
 */
$books = PostType::make('jl_books', __('Books', THEME_TEXTDOMAIN), __('Book', THEME_TEXTDOMAIN))->set([
    'labels' => [
        'search_items' => 'Search books'
    ],
    'menu_position' => 5
]);

$books->status([
    'in-purchase',
    'purchased'
]);