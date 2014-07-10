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
<h1>Themosis - Home</h1>
<p>{{ THEMOSIS_ASSETS }}</p>
@foreach($posts as $post)

<h3>{{ $post->post_title }}</h3>

@endforeach
<?php wp_footer(); ?>
</body>
</html>