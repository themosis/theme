<?php

$parent = Page::make('th-theme-settings', 'Theme Settings')->set();

$parent->addSections([
    Section::make('p-general', 'General')
]);

$parent->addSettings([
    'p-general' => [
        Field::text('theme')
    ]
]);

$child = Page::make('th-news-settings', 'News', $parent->get('slug'))->set(['menu' => 'News parameters']);

$child->addSections([
    Section::make('c-general', 'General')
]);

$child->addSettings([
    'c-general' => [
        Field::text('theme')
    ]
]);