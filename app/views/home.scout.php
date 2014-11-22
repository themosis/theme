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

@loop
    <h3>{{ Loop::title() }}</h3>
    {{ Loop::content() }}
@endloop

<p>{{ themosis_assets() }}</p>

@query(array('post_type' => 'post', 'posts_per_page' => -1, 'post_status' => 'publish'))

    <h3>Second loop: {{ Loop::title() }}</h3>

@endquery
<?php wp_footer(); ?>
</body>
</html>