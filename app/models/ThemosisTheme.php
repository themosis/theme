<?php
namespace MVPDesign\ThemosisTheme\Models;

class ThemosisTheme
{
    /**
     * is the theme responsive
     *
     * @return bool
     */
    public static function isResponsive()
    {
        return defined('RESPONSIVE') && RESPONSIVE;
    }

    /**
     * is the theme using google analytics
     *
     * @return bool
     */
    public static function isUsingGoogleAnalytics()
    {
        return defined('ENVIRONMENT') && ENVIRONMENT == 'local'
            && defined('GOOGLE_ANALYTICS_ID') && GOOGLE_ANALYTICS_ID
            && defined('GOOGLE_ANALYTICS_URL') && GOOGLE_ANALYTICS_URL;
    }

    /**
     * is the theme using google fonts
     *
     * @return bool
     */
    public static function isUsingGoogleFonts()
    {
        return defined('GOOGLE_FONTS') && GOOGLE_FONTS
            && defined('GOOGLE_FONTS_URL') && GOOGLE_FONTS_URL;
    }

    /**
     * is the theme using typekit
     *
     * @return bool
     */
    public static function isUsingTypekit()
    {
        return defined('TYPEKIT_KIT_ID') && TYPEKIT_KIT_ID
            && defined('TYPEKIT_KIT_URL') && TYPEKIT_KIT_URL;
    }

    /**
     * is the theme using typography
     *
     * @return bool
     */
    public static function isUsingTypography()
    {
        return defined('TYPOGRAPHY_USER_ID') && TYPOGRAPHY_USER_ID
            && defined('TYPOGRAPHY_PROJECT_ID') && TYPOGRAPHY_PROJECT_ID
            && defined('TYPOGRAPHY_URL') && TYPOGRAPHY_URL;
    }
}
