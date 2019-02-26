<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
</head>
<body>
	
</body>
</html>
<?php 
	include_once('lib/db.inc.php');
	function ierg4210_login(){
		if(empty($_POST['em']) || empty($_POST['pw'])
			|| !preg_match('/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/', $_POST['em'])
			|| !preg_match("/^[\w@#$%\^\&\*\-]+$/",$_POST['pw'])){
			// throw new Exception('111');
			echo "<script>alert('Failed to pass the validation!');";
			echo "window.location.href='Login.php'</script>";
		}else{
			$email = $_POST['em'];
			$password = $_POST['pw'];
			$right = $_POST['right'];
			global $db;
			$db = ierg4210_DB();
			$q=$db->prepare('SELECT * FROM user WHERE email = ?');
			$q->execute(array($email));
			if($r=$q->fetch()){
				$saltPassword = hash_hmac('sha256',$password,$r['salt']);
				if($saltPassword == $r['passwd'] && $right == $r['right']){
					$exp = time()+3600*24*3;
					$token = array(
						'right'=>$right,
						'em'=>$r['email'],
						'exp'=>$exp,
						'k'=>hash_hmac('sha256',$exp.$r['passwd'],$r['salt'])
					);
					setcookie('t4210',json_encode($token),$exp,'','',false,true);
					$_SESSION['t4210'] = $token;
					return true;
				}
			}
		}
	}
	function csrf_verifyNonce($action,$receivedNonce){
		if (isset($receivedNonce)&& $_SESSION['csrf_nonce'][$action]==$receivedNonce){
			return true;
		}
		throw new Exception('csrf-attack');
}
?>
<?php
session_start();
$login=ierg4210_login();
$csrf = csrf_verifyNonce($_REQUEST['action'],$_POST['nonce']);
if($csrf == true){
	if($login == true){
		$right = $_POST['right'];
		if($right == 1){
			header('Location:admin.php',true,302);
			exit();	
		}else{
			header('Location:index.php',true,302);
			exit();
		}
	}else{
		header('Location: login.php', true, 302);
		exit();
	}
}
?>