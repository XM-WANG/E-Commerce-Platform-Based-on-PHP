<?php
	include_once('lib/db.inc.php');
	global $db;
    $db = ierg4210_DB();
	$email = $_POST['email'];
	//echo $email;
	$q=$db->prepare('SELECT * FROM user WHERE email = ?');
	$q->execute(array($email));
	if($r=$q->fetch()){
		$salt = $r['salt'];
	}
	$resetPassword = mt_rand();
	$message = "https://secure.s49.ierg4210.ie.cuhk.edu.hk/newPassword.php?email=".$email."&resetPassword=".$resetPassword;
	$subject = "Reset your password if you forget it.";
	if(mail($email,$subject,$message)){
		echo "<script type='text/javascript'>alert('The reset email has been sent to your mail box.');location='login.php';</script>";
	}

?>


