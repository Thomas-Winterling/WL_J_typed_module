<?php
/**
 * @package    WL_TYPED_MODULE
 *
 * @author     Thomas Winterling <info@winterling-labs.com>
 * @copyright  Copyright (C) 2011 - 2019
 * @license    http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/

namespace Joomla\Module\TypedModule\Site\Helper;

\defined('_JEXEC') or die;


use Joomla\CMS\Factory;
use Joomla\CMS\Uri\Uri;



/**
 * Helper for WL_TYPED_MODULE
 *
 * @since  1.6
 */
class TypedModuleHelper
{

	public static function setCssParams(&$params)
    {
        $app = Factory::getApplication();
        /** @var Joomla\CMS\WebAsset\WebAssetManager $wa */
        $wa = $app->getDocument()->getWebAssetManager();
        $wa->registerAndUseStyle('mod_typed_module', 'mod_typed_module/style.css');

        // Add CSS Parameter
        // $document = Factory::getDocument();
        // $document->addStyleSheet(Uri::base() . 'media/mod_wl_typed_module/css/style.css');

        $style = '';

        $style .= '.wl_typed_module p { font-size: ' . $params->get('fontsize') . 'px;}';
        $style .= '.wl_typed_module p { color: ' . $params->get('fontcolor') . ';}';
        $style .= '.wl_typed_module span { color: ' . $params->get('wordcolor') . ';}';
        $style .= '.wl_typed_module span { font-size: ' . $params->get('textsize') .  'px;}';
        $style .= '.wl_typed_module { background: ' . $params->get('backgroundcolor') . ';}';

        $wa->addInlineStyle($style);
    }


    public static function SetJsParams(&$params)
    {

        $tagsPrams = (array) $params->get('fields');

        $tags = [];

        foreach ($tagsPrams as $tag)
        {
            array_push($tags, $tag->properties);
        }

        $tags = json_encode($tags);

        $typespeed = $params->get('fontspeed');
        $backDelay = $params->get('backdelay');
        $startDelay = $params->get('startdelay');
        $backSpeed = $params->get('backspeed');
        $loop = $params->get('loop');
        $showCursor = $params->get('cursor');

        /* Set Params */

        $app = Factory::getApplication();
        /** @var Joomla\CMS\WebAsset\WebAssetManager $wa */
        $wa = $app->getDocument()->getWebAssetManager();
        $wa->registerAndUseScript('mod_typed_module', 'mod_typed_module/typed.js');

        $script = "jQuery(document).ready(function () {  
                var typed = new Typed('#typed', {
                strings: " . $tags . ",
                typeSpeed: $typespeed,
                backDelay: $backDelay,
                startDelay: $startDelay,
                backSpeed: $backSpeed,
                loop: $loop,
                showCursor: $showCursor
            }); 
        });";

        /* Add javaScript */

        $wa->addInlineScript($script);
    }
}
