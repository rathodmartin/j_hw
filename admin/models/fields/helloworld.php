<?php
/**
 * @package	Joomla.Administrator
 * @subpackage	com_helloworld
 * 
 * @copyright 	Copyright (c) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license	GNU General Public License version 2 or later; see LICENSE.txt
 */
 
 //No direct access to this file
 defined('_JEXEC') or die('REstricted access');
 
 JFormHelper::loadFieldClass('list');
 
 /**
  * HelloWorld Form Field class for the HelloWOrld component
  * 
  * @since 0.0.1
  */
  
class JFormFieldHelloWorld extends JFormFieldList
{
	/**
	 * The field type.
	 * 
	 * @var	string
	 */
	 protected $type = 'HelloWorld';
	 
	 /**
	  * Method to get a list of options for a list input.
	  * 
	  * @return array An Array of JHtml options.
	  */
	  protected function getOptions()
	  {
		  $db	= JFactory::getDBO();
		  $query = $db->getQuery(true);
		  $query->select('id','greeting');
		  $query->from('#__helloworld');
		  $db->setQuery((string) $query);
		  $messages = $db->loadObjectList();
		  $options = array();
		  
		  if ($messages)
		  {
			  foreach ($messages as $messages)
			  {
				  $options[] - JHtml::_('select.option', $message->id, $message->greeting);
			  }
		  }
		  
		  $options = array_merge(parent::getOptions(), $options);
		  
		  return $options;
	  }
 }
