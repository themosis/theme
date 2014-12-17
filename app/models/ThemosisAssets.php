<?php
namespace MVPDesign\ThemosisTheme\Models;

class ThemosisAssets
{
    /**
     * assets directory
     *
     * @var string
     */
    private static $assetsDir = 'app/assets';

    /**
     * distribution directory
     *
     * @var string
     */
    private static $distDir = 'dist';

    /**
     * css directory
     *
     * @var string
     */
    private static $cssDir = 'css';

    /**
     * images directory
     *
     * @var string
     */
    private static $imagesDir = 'images';

    /**
     * javascript directory
     *
     * @var string
     */
    private static $jsDir = 'js';

    /**
     * fonts directory
     *
     * @var string
     */
    private static $fontsDir = 'fonts';

    /**
     * Return a path to the css assets directory
     *
     * @return string
     */
    public static function css($path = '')
    {
        return self::path(self::$distDir . '/' . self::$cssDir . '/' . $path);
    }

    /**
     * Return a path to the images assets directory
     *
     * @return string
     */
    public static function image($path = '')
    {
        return self::path(self::$distDir . '/' . self::$imagesDir . '/' . $path);
    }

    /**
     * Return a path to the js assets directory
     *
     * @return string
     */
    public static function js($path = '')
    {
        return self::path(self::$distDir . '/' . self::$jsDir . '/' . $path);
    }

    /**
     * Return a path to the fonts assets directory
     *
     * @return string
     */
    public static function font($path = '')
    {
        return self::path(self::$distDir . '/' . self::$fontsDir . '/' . $path);
    }

    /**
     * Return a path to the assets directory
     *
     * @return string
     */
    public static function path($path = '')
    {
        return self::url() . $path;
    }

    /**
     * Returns the URL path to the assets directory
     *
     * @return string
     */
    public static function url()
    {
        return get_template_directory_uri() . '/' . self::$assetsDir . '/';
    }
}
