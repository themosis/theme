<article id="post-{{ Loop::id() }}" {!! post_class() !!}>
    <header class="entry-header">
        <h2 class="entry-title">
            <a href="{{ esc_url(get_permalink()) }}" rel="bookmark">{!! Loop::title() !!}</a>
        </h2>
        @if('post' === get_post_type())
            <div class="entry-meta">
                {!! posted_on() !!}
                {!! posted_by() !!}
            </div>
        @endif
    </header>
    {!! post_thumbnail() !!}
    <div class="entry-summary">
        {!! Loop::excerpt() !!}
    </div>
    <footer class="entry-footer">
        @php(entry_footer())
    </footer>
</article><!-- #post-{{ Loop::id() }} -->
