<?php 
	include_once('lib/db.inc.php');

	function ierg4210_Session(){
		if(!empty($_SESSION['t4210']))
			return $$_SESSION['t4210']['em'];
		if(!empty($_COOKIE['t4210'])){
			if($t = json_decode(stripslashes($_COOKIE['t4210']),true)){
				if(time()>$t['exp']){
					return false;
				}else{
					global $db;
					$db = ierg4210_DB();
					$q = $db->prepare('SELECT * FROM user WHERE email = ?;');
					$q-> execute(array($t['em']));
					if($r = $q -> fetch()){
						$realk = hash_hmac('sha256', $t['exp'].$r['passwd'],$r['salt']);
						if($realk == $t['k']){
							$_SESSION['t4210'] = $t;
							return $t['em'];
						}
					}

				}
			}
		}
		return false;
	}
?>

 <?php 
 if(isset($_GET['flag'])){
 	echo ierg4210_Session(); 
}
 ?>