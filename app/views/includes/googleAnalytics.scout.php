@if ( $isUsingGoogleAnalytics )
    @section('dnsPrefetch')
    @parent
        <link href="{{ GOOGLE_ANALYTICS_URL }}" rel="dns-prefetch">
    @stop

    @section('afterWPHead')
    @parent
        <!-- Google Analytics -->
        <script type="text/javascript">
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','{{ GOOGLE_ANALYTICS_URL }}/analytics.js','ga');

            ga('create', '{{ GOOGLE_ANALYTICS_ID }}', 'auto');
            ga('send', 'pageview');
        </script>
    @stop
@endif
