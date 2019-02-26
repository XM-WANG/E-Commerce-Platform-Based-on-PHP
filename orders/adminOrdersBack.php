<?php 
include_once('../session-auth.php');
$em = ierg4210_Session();
if($em==null){
	echo "<script>alert('Failed to pass the validation!');";
	echo "window.location.href='../Login.php'</script>";
	exit();
}else{
	$db = ierg4210_DB();
	$q = $db->prepare('SELECT * FROM user WHERE email = ?;');
	$q-> execute(array($em));
	$r = $q -> fetch();
	if($r['right']!=1){
		header('Location:../index.php',true,302);
	}
}
?>
<?php
// 	function ierg4210_DB() {
// 	$db = new PDO('sqlite:E:/wamp/www/cart.db');
// 	$db->query('PRAGMA foreign_keys = ON;');
// 	$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
// 	return $db;
// } 

	function orders_fetchall() {
    global $db;
    $db = ierg4210_DB();
    $q = $db->prepare("SELECT * FROM orders LIMIT 100;");
    if ($q->execute())
        return $q->fetchAll();
	}
 ?>