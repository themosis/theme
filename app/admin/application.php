<?php

/**
 * application.php - Write your custom code below.
 */
$posts = array();
foreach(PostModel::all() as $post)
{
    $posts[$post->ID] = $post->post_title;
}

$metabox = Metabox::make('Link', 'post')->set(array(

    Field::media('pic', array('type' => 'application')),
    Field::collection('gallery', array('info' => 'Some help text.')),
    Field::text('uh', array('class' => 'uh-custom-class', 'info' => 'Some help here.')),
    Field::text('doh'),
    Field::text('douh', array('title' => 'Weird Title')),
    Field::textarea('story', array('class' => 'textarea-class', 'default' => 'A long time ago..........')),
    Field::media('cover', array('default' => '166')),
    //Field::editor('biography', array(), array('default' => 'Some default text for your biography.')),
    Field::checkbox('toggle', array('default' => false)),
    Field::checkboxes('colors', array('red', 'green', 'blue'), array('default' => 'green')),
    Field::checkboxes('couleurs', array('rouge', 'vert', 'bleu'), array('default' => array('vert', 'bleu'))),
    Field::checkboxes('farben', array('rose', 'pink', 'jaune')),
    Field::radio('size', array('small', 'medium', 'large'), array('default' => 'large')),
    Field::radio('length', array('tiny', 'normal', 'huge'), array('default' => array('tiny'))),
    Field::radio('gender', array('woman', 'man')),
    Field::select('related', array($posts), false, array('title' => 'Related post', 'default' => 115)),
    Field::select('country', array(
        array(
            'belgium',
            'france',
            'portugal'
        )
    ), false, array('default' => 2)),
    Field::select('countries', array(
        array(
            'belgium',
            'france',
            'portugal'
        )
    ), true, array('class' => 'custom-select-class', 'default' => array(1,2))),
    Field::select('area', array(
        array(
            'be' => 'Belgium',
            'fr' => 'France',
            'pt' => 'Portugal'
        )
    ), false, array('default' => 'pt')),
    Field::text('actor', array('default' => 'Marcel')),
    Field::password('secret', array('title' => 'Mot secret', 'default' => 'passworddd', 'class' => 'passme')),
    Field::infinite('things', array(
        Field::text('sock', array('default' => 'Super chaussette'))
    )),
    Field::infinite('stuffs', array(
        Field::text('stuff', array('default' => 'Un truc')),
        Field::media('image', array('default' => 166)),
        Field::password('key', array('default' => 'secret'))
    ))

));

$metabox->validate(array(
    'actor'     => array('textfield', 'min:5'),
    'things'    => array(
        'sock'  => array('num')
    )
));

PostType::make('jl_books', 'Books', 'Book')->set();

Metabox::make('Details', 'jl_books')->set(array(
    Field::media('cover', array('type' => 'image')),
    Field::infinite('gallery', array(
        Field::media('gallery_item'),
        Field::text('subtitle')
    ))
));

Taxonomy::make('publisher', 'jl_books', 'Publishers', 'Publisher')->set()->bind();
Taxonomy::make('author', array('jl_books', 'post'), 'Authors', 'Author')->set()->bind();

View::share('shared', array('a', 'b', 'c'));