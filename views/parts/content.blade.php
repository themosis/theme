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
            <div class="entry-meta"></div>
        @endif
    </header>
</article>