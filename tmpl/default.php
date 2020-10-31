<?php
/**
 * @package    WL_TYPED_MODULE
 *
 * @author     Thomas Winterling <info@winterling-labs.com>
 * @copyright  Copyright (C) 2011 - 2019
 * @license    http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/

defined('_JEXEC') or die;


use Joomla\CMS\HTML\HTMLHelper;

// HTMLHelper::_('stylesheet', 'mod_typed_module/style.css', array('version' => 'auto', 'relative' => true));
HTMLHelper::_('script', 'mod_typed_module/typed.js', array('version' => 'auto', 'relative' => true));
HTMLHelper::_('jQuery.Framework');



?>
<div class="wl_typed_module">
    <div class="wrap">
        <div class="headline">
            <div><p><?php echo $params->get('text'); ?></p></div>
            <div class="animate"><span class="typed-animation" id="typed"></span><?php echo $params->get('endtext'); ?></div>
        </div>
</div>
