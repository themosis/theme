<?php

namespace Themosis\Theme\Models;

class Post
{
    /**
     * @var \WP_Query
     */
    protected $query;

    public function __construct(\WP_Query $query)
    {
        $this->query = $query;
    }

    /**
     * Return a list of all published posts.
     *
     * @return array
     */
    public function all()
    {
        $this->query->query([
            'post_type' => 'post',
            'posts_per_page' => -1,
            'post_status' => 'publish',
        ]);

        return $this->query->get_posts();
    }
}
