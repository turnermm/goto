<?php
/**
 *@author    Myron Turner <turnermm02@shaw.ca> 
 */
 
if(!defined('DOKU_INC')) define('DOKU_INC',realpath(dirname(__FILE__).'/../../../').'/');
if(!defined('DOKU_PLUGIN')) define('DOKU_PLUGIN',DOKU_INC.'lib/plugins/');
require_once(DOKU_PLUGIN.'action.php');
class action_plugin_goto extends DokuWiki_Action_Plugin {
    public function register(Doku_Event_Handler $controller) {   
      $controller->register_hook('AUTH_LOGIN_CHECK', 'BEFORE', $this, 'handle_login',array('before'));
    }
	function handle_login(Doku_Event $event, $param) {   
	    global $conf;
		$auto_login = $this->getConf('auto_login');
        if(!empty($event->data['user'])) {
			if($auto_login) {
		       $user = $event->data['user']; 
               $option  = $this->getConf('auto_options');
               $common = $this->getConf('common_ns');
               if($common) {
                   $common = rtrim($common,':');    
               }               
               $srch = array('common_ns','user_page','user_ns','start_page');               
               $repl = array($common,$user,$user,$conf['start']);
               $value = str_replace($srch,$repl,$option);             						
			   setcookie("GOTO_LOGIN", $value, time()+120, DOKU_BASE);
			   return;
			}
			else {
				setcookie("DOKU_GOTO", $event->data['user'], time()+120, DOKU_BASE);
			}
        }
	}
}