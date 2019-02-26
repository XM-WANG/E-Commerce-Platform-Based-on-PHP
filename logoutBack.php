<?php 
	function ierg4210_logout(){
		session_start();
		$_SESSION = array();
		if(isset($_COOKIE['t4210'])){
			setcookie('t4210','',time()-1,'/');
		}
		session_destroy();
		header('Location: index.php', true, 302);
		exit();
	}
	ierg4210_logout();
 ?>