<?php


/*
Action::add('user_new_form', 'UserController@display');
// When editing another user profile.
Action::add('edit_user_profile', 'UserController@display');
// When editing its own profile.
Action::add('show_user_profile', 'UserController@display');
*/

//User::addSections();
User::addFields([
    Field::text('facebook', ['title' => 'Facebook profile'])
]);

User::addFields([
    Field::text('twitter')
]);