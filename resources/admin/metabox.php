<?php

$metabox = Metabox::make('Informations', 'post')->set([
    Field::text('author')
]);

$metabox->map(['author' => 'post_parent']);