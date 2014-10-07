<?php

$page = Page::make('th-custom-page', 'Theme options')->set();

$page->addSections(array(
    Section::make('th-general', 'General')
));

$page->addSettings(array(
    'th-general' => array(
        Field::text('website-name', array('title' => 'Website Name'))
    )
));