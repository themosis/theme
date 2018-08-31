<div id="comments" class="comments-area">
    @if(have_comments())
        <h2 class="comments-title">{!! comments_title(get_comments_number()) !!}</h2>
        {!! get_the_comments_navigation() !!}
        <ol class="comment-list">
            {!! wp_list_comments([
                'style' => 'ol',
                'short_ping' => true,
                'echo' => false
            ]) !!}
        </ol>
        {!! get_the_comments_navigation() !!}

        @unless(comments_open())
            <p class="no-comments">{{ esc_html__('Comments are closed.', THEME_TD) }}</p>
        @endunless
    @endif
    @php(comment_form())
</div><!-- #comments -->
