<body <?php body_class(); ?>>
    <!--[if lt IE 9]>
        <p>You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->

    @section('beforeHeader')
    @show
    {{ $header or '' }}
    @section('afterHeader')
    @show

    @section('beforeContent')
    @show
    {{ $content or '' }}
    @section('afterContent')
    @show

    @section('beforeFooter')
    @show
    {{ $footer or '' }}
    @section('afterFooter')
    @show

    @section('beforeWPFooter')
    @show
    <?php wp_footer(); ?>
    @section('afterWPFooter')
    @show
</body>
