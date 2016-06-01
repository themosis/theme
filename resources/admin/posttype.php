<?php

$cars = PostType::make('jl_cars', 'Cars', 'Car')->set([
    'public' => true,
    'rewrite' => [
        'slug' => 'cars'
    ]
]);

$cars->setTitle('Enter new car name...');