<?php

$posts = new \Theme\Models\Post();
$articles = [];

/*foreach ($posts->all() as $post) {
    $articles[$post->ID] = $post->post_title;
}*/

$options = [
    [
        'Select a speciality'
    ],
    'Portland' => [
        'dept-170' => 'Audiology',
        'dept-177' => 'Ear, Nose and Throat',
        'dept-178' => 'Infectious Disease',
        'dept-179' => 'Internal Medicine',
        'dept-180' => 'Pediatrics',
        'dept-181' => 'Surgery Center',
        'dept-182' => 'Travel Medicine',
        'dept-183' => 'Obstetrics and Gynecology'
    ],
    'South Portland' => [
        'dept-185' => 'Cardiology',
        'dept-186' => 'Family Medicine',
        'dept-187' => 'Imaging/Radiology',
        'dept-188' => 'Laboratory',
        'dept-189' => 'Pediatrics',
        'dept-190' => 'Physical Therapy',
        'dept-191' => 'Sports Medicine',
        'dept-192' => 'Urgent Care'
    ],
    'Yarmouth' => [
        'dept-193' => 'Family Medicine',
        'dept-195' => 'Pediatrics',
        'dept-196' => 'Physical Therapy'
    ],
    'Other Locations' => [
        'dept-197' => 'Administration and Billing',
        'dept-198' => 'Healthcare at Work'
    ]
];

/*$metabox = Metabox::make('Informations', 'post')->set([
    Field::text('author'),
    Field::select('related', [$articles]),
    Field::select('countries', [
        'Europe' => [
            'be' => 'Belgium',
            'fr' => 'France'
        ],
        'America' => [
            'ca' => 'Canada',
            'us' => 'United States of America',
            'xy' => 'Belgium'
        ],
        'Asia' => [
            'ch' => 'China',
            'jp' => 'Japan'
        ]
    ]),
    Field::select('services', $options)
]);

$metabox->map(['author' => 'post_parent']);*/

/**
 * Metabox should display only on pages with a 'custom-template'
 *
 * Test: in display = ok
 * Test: custom fields on display = ok
 */
//Metabox::make('Test', 'page', ['template' => 'custom-template'])->set([
//    Field::text('page-test'),
//    Field::checkbox('page-colors', ['Pink', 'Magenta'])
//]);