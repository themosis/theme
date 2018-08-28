<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>
</head>
<body>
    <div>
        @if(have_posts())
            @while(have_posts())
                @php(the_post())
                @php(the_content())
            @endwhile
        @endif
    </div>
    <?php wp_footer(); ?>
</body>
</html>