<?php
namespace MVPDesign\ThemosisTheme\Models;

use WP_Query;

class WPPost
{
    /**
     * Return a list of all published posts.
     *
     * @return array
     */
    public static function all()
    {
        $query = new WP_Query(array(
            'post_type'         => 'post',
            'posts_per_page'    => -1,
            'post_status'       => 'publish'
        ));

        return $query->get_posts();
    }
}
