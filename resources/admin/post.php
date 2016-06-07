<?php

Metabox::make('Divers', 'post')->set([
    Field::infinite('master', [
        Field::text('puppet')
    ]),
    Field::infinite('parent', [
        Field::infinite('child', [
            Field::text('name'),
            Field::checkbox('toogle', ['enable'])
        ])
    ])
]);