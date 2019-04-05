<?php
/**
 * Options for the goto plugin
 *
 * @author cziehr <info@einsatzleiterwiki.de>
  *@author    Myron Turner <turnermm02@shaw.ca> 
 */

$meta['seconds']       = array('numeric', '_pattern' => '/[0-9]+/');
$meta['minSeconds']    = array('numeric', '_pattern' => '/[0-9]+/');
$meta['auto_login'] = array('onoff');
$meta['auto_options'] = array('multichoice','_choices'=>array(':user_page',':user_ns:user_page',':user_ns:start_page',':common_ns:user_page'));
$meta['common_ns'] = array('string');
$meta['group'] = array('string');
$meta['group_options'] = array('multichoice','_choices'=>array('start_page','user_page'));
$meta['only_option'] = array('multichoice','_choices'=>array('default','user','group'));
