<?php
if(!defined('DOKU_INC')) define('DOKU_INC',realpath(dirname(__FILE__).'/../../../').'/');
if(!defined('DOKU_PLUGIN')) define('DOKU_PLUGIN',DOKU_INC.'lib/plugins/');
require_once(DOKU_PLUGIN.'action.php');
class action_plugin_goto extends DokuWiki_Action_Plugin {
    public function register(Doku_Event_Handler $controller) {   
      $controller->register_hook('AUTH_LOGIN_CHECK', 'BEFORE', $this, 'handle_login',array('before')); 	    
    }
	function handle_login(Doku_Event $event, $param) {   
        if(!empty($event->data['user'])) {
          $value = $event->data['user'];
          setcookie("DOKU_GOTO", $value, time()+120, DOKU_BASE);
        }
	}
}