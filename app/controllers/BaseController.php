<?php
namespace MVPDesign\ThemosisTheme\Controllers;

use Controller;
use View;
use MVPDesign\ThemosisTheme\Models\WPGeneral;
use MVPDesign\ThemosisTheme\Models\ThemosisTheme;

class BaseController extends Controller
{
    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout()
    {
        if (! is_null($this->layout)) {
            $data = array(
                'languageAttributes'     => WPGeneral::getLanguageAttributes(),
                'charset'                => WPGeneral::getBlogInfo('charset'),
                'title'                  => WPGeneral::getPageTitle('|', 'right'),
                'description'            => WPGeneral::getBlogInfo('description'),
                'isResponsive'           => ThemosisTheme::isResponsive(),
                'isUsingGoogleAnalytics' => ThemosisTheme::isUsingGoogleAnalytics(),
                'isUsingGoogleFonts'     => ThemosisTheme::isUsingGoogleFonts(),
                'isUsingTypekit'         => ThemosisTheme::isUsingTypekit(),
                'isUsingTypography'      => ThemosisTheme::isUsingTypography()
            );

            $this->layout = View::make($this->layout, $data);
        }
    }
}
