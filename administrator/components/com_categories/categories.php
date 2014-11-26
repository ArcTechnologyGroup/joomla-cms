<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_categories
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;
JHtml::_('behavior.tabstate');

$input = JFactory::getApplication()->input;

// If you have a url like this: com_categories&view=categories&extension=com_example.example_cat
$parts = explode('.', $input->get('extension'));
$component = $parts[0];

if (!JFactory::getUser()->authorise('core.manage', $component))
{
	return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}

JLoader::register('JHtmlCategoriesAdministrator', JPATH_ADMINISTRATOR . '/components/com_categories/helpers/html/categoriesadministrator.php');

$task = $input->get('task');

$controller = JControllerLegacy::getInstance('Categories');
$controller->execute($input->get('task'));
$controller->redirect();
