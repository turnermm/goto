<?php
if(!defined('DOKU_INC')) define('DOKU_INC',realpath(dirname(__FILE__).'/../../../').'/');
if(!defined('DOKU_PLUGIN')) define('DOKU_PLUGIN',DOKU_INC.'lib/plugins/');
require_once(DOKU_PLUGIN.'action.php');
class action_plugin_goto extends DokuWiki_Action_Plugin {
    public function register(Doku_Event_Handler $controller) {   
      $controller->register_hook('AUTH_LOGIN_CHECK', 'BEFORE', $this, 'handle_login',array('before')); 	    
	  // $controller->register_hook('AUTH_LOGIN_CHECK', 'AFTER', $this, 'handle_login',array('after')); 	    
   
    }
	function handle_login(Doku_Event $event, $param) {   
	  global $JSINFO;
//	  $prefs = print_r($_COOKIE['DOKU_PREFS'],1);
	//  msg($prefs);
	  if(!empty($event->data['user'])) {
		  $value = $event->data['user'];
	    $ar = print_r($event->data,1);
	     $JSINFO['goto'] = 'go';
		 $n =$JSINFO['goto'] ;
	     msg($param[0] . "--".$ar . "--". $n, 1); 
		 //msg(time());
		// msg(time()+120);
		msg(strftime("%b %d %Y %H:%M:%S",time()));
		msg(strftime("%b %d %Y %H:%M:%S",time()+120));
		msg (date('r',time()+120));
		
		setcookie("TestCookie", $value, time()+120, DOKU_BASE);
	 }


	}
}