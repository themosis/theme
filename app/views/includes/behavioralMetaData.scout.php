@section('behavioralMetaData')
@parent
    <meta name="apple-mobile-web-app-capable" content="yes">
    @if ( $isResponsive )
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    @else
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @endif
@stop
