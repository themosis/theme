<?php

if (! function_exists('posted_on')) {
    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function posted_on()
    {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

        if (get_the_time('U') !== get_the_modified_time('U')) {
            $time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }

        $time_string = sprintf(
            $time_string,
            esc_attr(get_the_date(DATE_W3C)),
            esc_html(get_the_date()),
            esc_attr(get_the_modified_date(DATE_W3C)),
            esc_html(get_the_modified_date())
        );

        /* translators: %s: post date. */
        $posted_on = sprintf(
            esc_html_x('Posted on %s', 'post date', THEME_TD),
            '<a href="'.esc_url(get_permalink()).'" rel="bookmark">'.$time_string.'</a>'
        );

        return '<span class="posted-on">'.$posted_on.'</span>';
    }
}

if (! function_exists('posted_by')) {
    /**
     * Prints HTML with meta information for the current author.
     */
    function posted_by()
    {
        /* translators: %s: post author. */
        $byline = sprintf(
            esc_html_x('by %s', 'post author', THEME_TD),
            '<span class="author vcard"><a class="url fn n" href="'.esc_url(get_author_posts_url(get_the_author_meta('ID'))).'">'.esc_html(get_the_author()).'</a></span>'
        );

        return '<span class="byline">'.$byline.'</span>';
    }
}

if (! function_exists('post_thumbnail')) {
    /**
     * Displays an optional post thumbnail.
     *
     * Wraps the post thumbnail in an anchor element on index views, or a div
     * element when on single views.
     */
    function post_thumbnail()
    {
        if (post_password_required() || is_attachment() || ! has_post_thumbnail()) {
            return;
        }

        if (is_singular()) {
            return sprintf(
                '<div class="post-thumbnail">%s</div>',
                get_the_post_thumbnail()
            );
        } else {
            return sprintf(
                '<a class="post-thumbnail" href="%s" aria-hidden="true" tabindex="-1">%s</a>',
                get_permalink(),
                get_the_post_thumbnail(null, 'post-thumbnail', [
                    'alt' => the_title_attribute(['echo' => false])
                ])
            );
        }
    }
}

if (! function_exists('entry_footer')) {
    /**
     * Prints HTML with meta information for the categories, tags and comments.
     */
    function entry_footer()
    {
        // Hide category and tag text for pages.
        if ('post' === get_post_type()) {
            /* translators: used between list items, there is a space after the comma */
            $categories_list = get_the_category_list(esc_html__(', ', THEME_TD));

            if ($categories_list) {
                /* translators: 1: list of categories. */
                printf(
                    '<span class="cat-links">'.esc_html__('Posted in %1$s', THEME_TD).'</span>',
                    $categories_list
                );
            }

            /* translators: used between list items, there is a space after the comma */
            $tags_list = get_the_tag_list('', esc_html_x(', ', 'list item separator', THEME_TD));

            if ($tags_list) {
                /* translators: 1: list of tags. */
                printf(
                    '<span class="tags-links">'.esc_html__('Tagged %1$s', THEME_TD).'</span>',
                    $tags_list
                );
            }
        }

        if (! is_single() && ! post_password_required() && (comments_open() || get_comments_number())) {
            echo '<span class="comments-link">';
            comments_popup_link(
                sprintf(
                    wp_kses(
                        /* translators: %s: post title */
                        __('Leave a Comment<span class="screen-reader-text"> on %s</span>', THEME_TD),
                        [
                            'span' => [
                                'class' => []
                            ]
                        ]
                    ),
                    get_the_title()
                )
            );
            echo '</span>';
        }

        edit_post_link(
            sprintf(
                wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                    __('Edit <span class="screen-reader-text">%s</span>', THEME_TD),
                    [
                        'span' => [
                            'class' => []
                        ]
                    ]
                ),
                get_the_title()
            ),
            '<span class="edit-link">',
            '</span>'
        );
    }
}

if (! function_exists('comments_title')) {
    /**
     * Return the comments title.
     *
     * @param int $count The number of comments.
     *
     * @return string
     */
    function comments_title($count)
    {
        if (1 === $count) {
            return sprintf(
                esc_html__('One thought on &ldquo;%1$s&rdquo;', THEME_TD),
                '<span>'.get_the_title().'</span>'
            );
        }

        return sprintf(
            esc_html(_nx('%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $count, 'comments title', THEME_TD)),
            number_format_i18n($count),
            '<span>'.get_the_title().'</span>'
        );
    }
}

if (! function_exists('archive_content_message')) {
    /**
     * Return an archive content message.
     *
     * @return string
     */
    function archive_content_message()
    {
        return sprintf(
            '<p>'.esc_html__('Try looking in the monthly archives. %1$s', THEME_TD).'</p>',
            convert_smilies(':)')
        );
    }
}
