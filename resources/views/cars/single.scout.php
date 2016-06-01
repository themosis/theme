<html>
<head>
    <?php wp_head(); ?>
</head>
<body>
@loop
    <h2>{{ Loop::title() }}</h2>
@endloop
@query(['post_type' => 'post', 'posts_per_page' => 3])
    <h3>{{ Loop::title() }}</h3>
    <em>{{ meta('author') }}</em>
@endquery

<?php wp_footer(); ?>
</body>
</html>