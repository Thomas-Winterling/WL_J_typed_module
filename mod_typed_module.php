<?php
/**
 * @package    WL_TYPED_MODULE
 *
 * @author     Thomas Winterling <info@winterling-labs.com>
 * @copyright  Copyright (C) 2011 - 2019
 * @license    http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 **/

defined('_JEXEC') or die;


use Joomla\CMS\Helper\ModuleHelper;
use Joomla\Module\TypedModule\Site\Helper\TypedModuleHelper;

TypedModuleHelper::setCssParams($params);
TypedModuleHelper::SetJsParams($params);


require ModuleHelper::getLayoutPath('mod_typed_module', $params->get('layout', 'default'));
