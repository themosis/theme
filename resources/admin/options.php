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
        Field::text('hebdo-title')
    ]
]);