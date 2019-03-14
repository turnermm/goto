<?php
/**
 * Options for the goto plugin
 *
 * @author cziehr <info@einsatzleiterwiki.de>
 */

$meta['seconds']       = array('numeric', '_pattern' => '/[0-9]+/');
$meta['minSeconds']    = array('numeric', '_pattern' => '/[0-9]+/');
$meta['auto_login'] = array('onoff');
$meta['auto_options'] = array('multichoice','_choices'=>array(':user_page',':common_ns:user_page',':user_ns:user_page',':user_ns:start_page'));
$meta['common_ns'] = array('string');
