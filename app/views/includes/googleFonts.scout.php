@if ( $isUsingGoogleFonts )
    @section('dnsPrefetch')
    @parent
        <link href="{{ GOOGLE_FONTS_URL }}" rel="dns-prefetch">
    @stop

    @section('afterWPHead')
    @parent
        <!-- google fonts -->
        <link async rel="stylesheet" type="text/css" href="{{ GOOGLE_FONTS_URL }}/css?family={{ str_replace(' ', '+', GOOGLE_FONTS) }}" />
    @stop
@endif
