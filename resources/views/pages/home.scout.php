<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body>
<div id="app">
    <div class="wrapper">
        <div class="head">
            <h1>{{ __('Congratulations!', THEMOSIS_TEXTDOMAIN) }}</h1>
            <p>{{ __('The Themosis framework is running.', THEMOSIS_TEXTDOMAIN) }}</p>
            <a id="ajax-button" href="#">Click me!</a>
        </div>
        <div class="frame clearfix">
            <div id="get-started">
                <div class="container">
                    <h2>{{ __('Get started:', THEMOSIS_TEXTDOMAIN) }}</h2>
                    <p>{{ __('Check the documentation and build your next WordPress website/application.', THEMOSIS_TEXTDOMAIN) }}</p>
                    <a href="http://framework.themosis.com/docs/" target="_blank" title="{{ __('Themosis framework documentation', THEMOSIS_TEXTDOMAIN) }}">{{ __('View documentation', THEMOSIS_TEXTDOMAIN) }}</a>
                </div>
            </div>
            <div id="links">
                <div class="container">
                    <h3>{{ __('Links:', THEMOSIS_TEXTDOMAIN) }}</h3>
                    <ul>
                        <li><a href="http://framework.themosis.com" target="_blank" title="Themosis framework">Themosis framework</a></li>
                        <li><a href="https://github.com/themosis" target="_blank" title="GitHub - Themosis">GitHub</a></li>
                        <li><a href="https://twitter.com/Themosis" target="_blank" title="Twitter - Themosis">Twitter</a></li>
                    </ul>
                </div>
            </div>
            @loop
                {{ Meta::get(Loop::id(), 'types') }}
            @endloop
            {{ APPVERSION }}
        </div>
    </div>
</div>
<?php wp_footer(); ?>
</body>
</html>