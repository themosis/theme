<?php
namespace MVPDesign\ThemosisTheme\Models;

class WPGeneral
{
    /**
     * Return the language HTML attributes
     *
     * @return string
     */
    public static function getLanguageAttributes()
    {
        ob_start();
        language_attributes();
        return ob_get_clean();
    }

    /**
     * Return information about the blog
     *
     * @param  string $show
     * @param  string $filter
     * @return string
     */
    public static function getBlogInfo($show = '', $filter = 'raw')
    {
        return get_bloginfo($show, $filter);
    }

    /**
     * Return the page title for the blog
     *
     * @param  string $sep
     * @param  string $seplocation
     * @return string
     */
    public static function getPageTitle($sep = '&raquo;', $seplocation = '')
    {
        return wp_title($sep, false, $seplocation);
    }
}
