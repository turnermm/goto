<?php

/**
 * @license    GPL 3 (http://www.gnu.org/licenses/gpl.html)
 * 
 * @author cziehr <info@einsatzleiterwiki.de>
 *@author    Myron Turner <turnermm02@shaw.ca> 
 */
$lang['seconds']     = 'Time till redirection (in seconds)';
$lang['minSeconds']  = 'Minimal time which is allowed till redirection (in seconds)';
$lang['auto_login'] = 'On login, automatically go to a predefined page, as set in the <code>auto_options</code> setting';
$lang['auto_options'] = 'Target for the auto_login page. In each case <b>user</b> refers to the user\'s ' .
         ' login name.  If the login name is "foo", then ":user_page" is ":foo"; '  .
		 ' "user_ns:user_page" is ":foo:foo"; ":user_ns:start_page" is ":foo:start". The <b>common_ns</b> ' .
		 'is defined in the <code>common_ns</code> option.';
$lang['common_ns'] = 'An arbitrarily defined namespace of any depth where all auto login pages will reside. This can include the wildcard <code>user_ns<code>';		 
	