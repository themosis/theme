<?php

//tp(User::misc());

Action::add('user_new_form', 'UserController@display');
// When editing another user profile.
Action::add('edit_user_profile', 'UserController@display');
// When editing its own profile.
Action::add('show_user_profile', 'UserController@display');