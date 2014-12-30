@if ( $isUsingTypography )
    @section('dnsPrefetch')
    @parent
        <link href="{{ TYPOGRAPHY_URL }}" rel="dns-prefetch">
    @stop

    @section('afterWPHead')
    @parent
        <!-- Typography -->
        <link async rel="stylesheet" type="text/css" href="{{ TYPOGRAPHY_URL }}/{{ TYPOGRAPHY_USER_ID }}/{{ TYPOGRAPHY_PROJECT_ID }}/css/fonts.css" />
    @stop
@endif
