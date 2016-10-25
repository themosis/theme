<?php

$posts = new \Themosis\Theme\Models\Post(new WP_Query());
$articles = [];

foreach ($posts->all() as $post) {
    $articles[$post->ID] = $post->post_title;
}

$metabox = Metabox::make('Informations', 'post')->set([
    Field::text('author'),
    Field::select('related', [$articles])
]);

$metabox->map(['author' => 'post_parent']);

/**
 * Metabox should display only on pages with a 'custom-template'
 *
 * Test: in display = ok
 * Test: custom fields on display = ok
 */
Metabox::make('Test', 'page', ['template' => 'custom-template'])->set([
    Field::text('page-test'),
    Field::checkbox('page-colors', ['Pink', 'Magenta'])
]);