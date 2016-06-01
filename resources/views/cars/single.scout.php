<html>
<head>
    <?php wp_head(); ?>
</head>
<body>
@loop
    <h2>{{ Loop::title() }}</h2>
@endloop
<?php wp_footer(); ?>
</body>
</html>