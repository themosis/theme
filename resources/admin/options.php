<?php

$page = Page::make('newsletter-hebdo', 'Newsletter Hebdo')->set([
    'icon'          => 'dashicons-admin-site',
    'tabs'          => true
]);

$page->addSections([
    Section::make('newsletter-hebdo-posts', 'Newsletter Hebdo')
]);

$page->addSettings([
    'newsletter-hebdo-posts'    => [
        Field::text('hebdo-title'),
        Field::checkbox('enable-registration', ['enable' => 'Enable'], ['title' => 'Enable Registration']),
        Field::checkbox('enable-notification', 'activate', ['title' => 'Activate notification']),
        Field::radio('report', ['short', 'full']),
        Field::select('country', [[
            'Belgium',
            'Portugal',
            'Usa'
        ]]),
        Field::infinite('stuff', [
            Field::text('name'),
            Field::media('profile'),
            Field::collection('gallery')
        ])
    ]
]);