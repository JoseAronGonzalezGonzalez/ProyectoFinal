<?php	
	// if(isset($_SESSION)){
 //  	  session_destroy();
	// }
	// session_destroy();
	if(!isset($_SESSION)){
    session_start();
	}else{
		session_destroy();
	}
	header('location: ./');
?>