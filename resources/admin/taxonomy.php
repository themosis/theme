<?php

$genres = Taxonomy::make('th-genres', 'post', 'Genres', 'Genre')->set()->bind();

$genres->addFields([
    Field::text('website'),
    Field::textarea('summary'),
    Field::checkbox('toggle', ['enable' => 'Click me if you dare!']),
    Field::checkbox('ages', ['kid', 'teenager', 'adult']),
    Field::color('color'),
    Field::media('profile'),
    Field::media('cover'),
    Field::select('region', [['America', 'Europe', 'Africa', 'Asia']]),
    Field::select('vacation', [['Belgium', 'Martinique', 'Spain', 'USA', 'Australia']], ['title' => 'Holidays'], ['multiple']),
    Field::editor('somemuchtosay', ['title' => 'Content'], ['textarea_rows' => 4, 'teeny' => true]),
    Field::radio('direction', ['left', 'right']),
    Field::collection('collection'),
    Field::infinite('fullfeatured', [
        Field::text('name'),
        Field::media('pic'),
        Field::collection('gallery'),
        Field::checkbox('toggleme', ['launch'])
    ])
]);

$genres->sanitize([
    'website' => ['url'],
    'fullfeatured' => [
        'name' => ['url']
    ]
]);

/**
 * Add custom fields to category core taxonomy
 *
 */
Taxonomy::addFields([
    Field::text('publisher')
], 'category');