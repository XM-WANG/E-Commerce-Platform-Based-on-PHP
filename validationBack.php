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
	function ierg4210_DB() {
		$db = new PDO('sqlite:E:/wamp/www/cart.db');
		$db->query('PRAGMA foreign_keys = ON;');
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		return $db;
	}
	function ierg4210_salt(){
		global $db;
		$db = ierg4210_DB();
		$email ="'".(string)$_POST["em"]."'";
		$right = $_POST["right"];
		$sql = "SELECT * FROM user WHERE email = $email AND right = $right;";
		$q = $db->prepare($sql);
		if ($q->execute())
		    return $q->fetchAll();
	}

	function ireg4210_user_auth(){
		global $db;
		$db = ierg4210_DB();
		$res = ierg4210_salt();
		foreach ($res as $value){
			$salt = $value["salt"];
		}
		$email ="'".(string)$_POST["em"]."'";
		$pw = $_POST["pw"];
		$passwd ="'".hash_hmac('sha256',$pw,$salt)."'";
		$right = $_POST["right"]; 
		$sql = "SELECT * FROM user WHERE email = $email AND passwd = $passwd AND right = $right;";
		$q = $db->prepare($sql);
		if ($q->execute())
		    return $q->fetchAll();
	}

	function ierg4210_login(){
		if(empty($_POST['em']) || empty($_POST['pw'])
			|| !preg_match('/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/', $_POST['em'])
			|| !preg_match("/^[\w@#$%\^\&\*\-]+$/",$_POST['pw'])){
			echo "<script>alert('Failed to pass the validation!');";
			echo "window.location.href='Login.php'</script>";
		}else{
			$result = ireg4210_user_auth();
			return $result;
		}

}
?>

<?php
	//if __name__ = __main__ :
	$res = ierg4210_login();	
	if($res==Null){
		echo "<script>alert('Failed to pass the validation!');";
		echo "window.location.href='index.php'</script>";
		exit();
	}else{
		$email ='"'.(string)$_POST["em"].'"';
		echo "<script>window.location.href='change.php?email=".$email."'</script>";
		exit();
	}
 ?>	
		
