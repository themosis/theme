<html>
<head>
    <?php wp_head(); ?>
</head>
<body>

    <a id="ajax-button" href="#">Click me!</a>

    <?php
        $c = \Themosis\Facades\Form::checkbox('colors', ['red', 'green', 'blue'], 'green');
        echo $c;
    ?>

<?php wp_footer(); ?>
</body>
</html>