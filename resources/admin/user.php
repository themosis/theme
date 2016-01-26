<?php

/*
Action::add('user_new_form', 'UserController@display');
// When editing another user profile.
Action::add('edit_user_profile', 'UserController@display');
// When editing its own profile.
Action::add('show_user_profile', 'UserController@display');
*/

$user = User::addSections([
    Section::make('social', 'Social Informations')
]);

$user->addFields([
    'social'    => [
        Field::text('facebook', ['title' => 'Facebook profile']),
        Field::textarea('history'),
        Field::checkbox('user-options', ['red', 'blue', 'green']),
        Field::checkbox('newsletter', 'newsletter'),
        Field::select('groups', [['Alpha', 'Gamma', 'Omega']]),
        Field::number('friends_number', ['title' => 'Friends']),
        Field::collection('profile_pics', ['title' => 'Profile pictures']),
        Field::editor('resume'),
        Field::infinite('experience', [
            Field::text('title'),
            Field::textarea('description')
        ])
    ]
]);

$user2 = User::addFields([
    Field::text('twitter'),
    Field::number('year_of_experience', ['title' => 'Years of experience']),
    Field::color('color_pref', ['title' => 'Color Preference'])
]);

$user2->validate([
    'twitter'   => ['min:3'],
    'year_of_experience' => ['num']
]);