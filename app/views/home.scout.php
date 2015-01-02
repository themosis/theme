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
<h1>Themosis - Home - {{ $prout }}</h1>

<p>{{ $composed or 'Composer not yet available' }}</p>

<p>{{ $classCompose or 'Class composer not yet available' }}</p>

<p>{{ $common or 'Common data from composer' }}</p>

<p>{{ $special or 'Multiple composers not yet available' }}</p>

@loop
    <article {{ Loop::postClass() }}>
        <h3>{{ Loop::title() }}</h3>
        {{ Loop::content() }}
        <p>ID: {{ Loop::id() }}</p>
    </article>
@endloop

<p>{{ themosis_assets() }}</p>

@query(array('post_type' => 'post', 'posts_per_page' => 3, 'post_status' => 'publish'))

    <h3>Second loop: {{ Loop::title() }}</h3>

@endquery
<?php wp_footer(); ?>
</body>
</html>