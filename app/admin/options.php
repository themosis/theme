<?php

$page = Page::make('th-custom-page', 'Theme options')->set();

$page->addSections(array(
    Section::make('th-general', 'General'),
    Section::make('th-secondary', 'Secondary')
));

$page->addSettings(array(
    'th-general' => array(
        Field::collection('website-pics'),
        Field::text('website-name', array('title' => 'Website Name', 'default' => 'My Website', 'class' => 'simple-text')),
        Field::infinite('website-infinite', array(
            Field::media('thumbnail'),
            Field::collection('pics')
        )),
        Field::textarea('website-excerpt', array('title' => 'Excerpt', 'default' => 'An awesome website for great and nice people.')),
        Field::password('website-password', array('default' => 'super')),
        Field::editor('website-description', array(), array('default' => 'Explain your website in 160 characters.')),
        Field::checkbox('website-online', array('default' => true)),
        Field::checkbox('website-maintenance', array('title' => 'Maintenance')),
        Field::checkboxes('website-groups', array('abc', 'def', 'ghi')),
        Field::checkboxes('website-companies', array('google', 'apple', 'microsoft'), array('default' => 'apple')),
        Field::checkboxes('website-dbs', array('mysql', 'mariadb', 'redis'), array('default' => array('mariadb'))),
        Field::radio('website-sidebar', array('none', 'left', 'right'), array('default' => 'right')),
        Field::radio('website-theme', array('blue', 'orange', 'pink'), array('default' => array('orange'))),
        Field::select('website-area', array(
            array(
                'europe',
                'asia',
                'usa'
            )
        ), false, array('default' => 1)),
        Field::select('website-zones', array(
            'Europe' => array(
                'de' => 'Germany',
                'nl' => 'Netherland'
            ),
            'Asia' => array(
                'jp' => 'Japan',
                'in' => 'India'
            ),
            'America' => array(
                'usa' => 'United States',
                'ca' => 'Canada'
            )
        ), true, array('default' => array('jp', 'ca'))),
        Field::media('website-preview', array('default' => 166))
    ),
    'th-secondary' => array(
        Field::infinite('website-xyz', array(
            Field::text('beverage', array('default' => 'Cola')),
            Field::checkbox('toggle'),
            Field::select('shipping', array(
                array('Air', 'Teleportation', 'Sea')
            ), false, array('default' => 1))
        )),
        Field::media('secondary-image')
    )
));