function goto_redirect(which) {
	 var user = goto_getCookie("DOKU_GOTO");      
      if(!user) {
          return;
      }   	 
   	clearTimeout(goto_tm);
      location.href = which;
     setGotoCookie("DOKU_GOTO", "") ;
     
 
}
function goto_getCookie(name) {
    var re = new RegExp(name + "=([^;]+)");
    var value = re.exec(document.cookie);
    return (value != null) ?decodeURIComponent(value[1]) : null;
}

function setGotoCookie(cname, cvalue) {
    var d = new Date();  
    d.setTime(d.getTime() - (60*60*1000)); //60 minutes 
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path="+DOKU_BASE;    
}
