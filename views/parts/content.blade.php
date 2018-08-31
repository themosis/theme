<article id="post-{{ Loop::id() }}" {!! post_class() !!}>
    <header class="entry-header">
        @if(is_singular())
            <h1 class="entry-title">{{ Loop::title() }}</h1>
        @else
            <h2 class="entry-title">
                <a href="{{ esc_url(get_permalink()) }}" rel="bookmark">{{ Loop::title() }}</a>
            </h2>
        @endif

        @if('post' === get_post_type())
            <div class="entry-meta">
                {!! posted_on() !!}
                {!! posted_by() !!}
            </div>
        @endif
    </header>
    {!! post_thumbnail() !!}
    <div class="entry-content">
        {!! Loop::content(sprintf(
            wp_kses(
                __('Continue reading<span class="screen-reader-text"> "%s"</span>', THEME_TD),
                [
                    'span' => [
                        'class' => []
                    ]
                ]
            ),
            Loop::title()
        )) !!}
        {!!
            wp_link_pages([
                'before' => '<div class="page-links">'.esc_html__('Pages:', THEME_TD),
                'after' => '</div>',
                'echo' => false
            ]);
        !!}
    </div>
    <footer class="entry-footer">
        @php(entry_footer())
    </footer>
</article><!-- #post-{{ Loop::id() }} -->