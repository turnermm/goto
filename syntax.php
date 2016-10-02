    <?php
    /**
    * GOTO Plugin: Easily redirect to other pages in your wiki.
    * 
    * @license    GPL 2 (http://www.gnu.org/licenses/gpl.html)
    * @author     Allen Ormond <aormond atgmaildotcom>  
    */
     
    if(!defined('DOKU_INC')) define('DOKU_INC',realpath(dirname(__FILE__).'/../../').'/');
    if(!defined('DOKU_PLUGIN')) define('DOKU_PLUGIN',DOKU_INC.'lib/plugins/');
    require_once(DOKU_PLUGIN.'syntax.php');
     
    class  syntax_plugin_goto extends DokuWiki_Syntax_Plugin {
     
    		function getType(){
    			return('substition');
    		}
     
    		function connectTo($mode) {
    			$this->Lexer->addSpecialPattern('(?i)~~GOTO>.+?~~',$mode,'plugin_goto');
    			}
     
    			function getSort() {
    				return 249;
    			}
     
    			function handle($match, $state, $pos, Doku_Handler $handler){
     
    				$seconds = 10;        //Default number of seconds to wait before redirect.
    				$minSeconds = 3;      //Minimum number of seconds allowed before redirect.
     
    				/* $message is the redirection message that is displayed. %d will be replaced with a link
    				*  to the destination. %s will be replaced with the number of seconds before redirect. */
    				$message = "<strong>".$this->getLang('redirect')."</strong>";
     
    				global $ID;
    				$matches = explode("?", substr($match,7,-2));
    				if (is_numeric($matches[1])){ $seconds = $matches[1]; }
    				if ($seconds < $minSeconds){ $seconds = $minSeconds; }//Check that seconds is greater than $minSeconds.
    				resolve_pageid(getNS($ID), $matches[0], $exists);
    				$message = str_replace("%D","%d",$message);//Make %d case insensitive.
    				$message = str_replace("%S","%s",$message);//Make %s case insensitive.
    				return array($matches[0], $seconds, $message);
    			}
     
    			function render($mode, Doku_Renderer $renderer, $data) {
    				$message = str_replace("%d",$renderer->internallink($data[0], $data[0],'', true),$data[2]);
    				$message = str_replace("%s",$data[1],$message);
    				$renderer->doc .= $message;
    				$renderer->doc .= '<script>url="'.wl($data[0]).'";setTimeout("location.href=url",'.($data[1]*1000).');</script>';
    			}
     
    		}
