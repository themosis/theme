<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Themosis</title>
    <meta name="description" content="Themosis framework">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body>
<h1>Sample Page</h1>
<p>Hello World!</p>

<p>{{ $prout }}</p>
<p>{{ $common or 'Composer view not available' }}</p>
<p>{{ $special or 'Multiple composers not available' }}</p>
<ul>
    @foreach($shared as $letter)
        <li>{{ $letter }}</li>
    @endforeach
</ul>

<div class="form">
    <h2>Basic form</h2>
    {{ Form::open() }}

    <p>{{ Form::label('acteur', 'Acteur:') }}</p>
    <p>{{ Form::text('acteur', '', array('id' => 'acteur')) }}</p>
    <p>{{ Form::label('director', 'Director email:') }}</p>
    <p>{{ Form::text('director', '', array('id' => 'director')) }}</p>

    <p>{{ Form::submit('submit', 'Submit') }}</p>

    {{ Form::close() }}
</div>

<?php wp_footer(); ?>
</body>
</html>