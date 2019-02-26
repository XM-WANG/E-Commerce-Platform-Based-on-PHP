<?php
require __DIR__.'/lib/db.inc.php';

function genDigest(){
	$salt = mt_rand().mt_rand();
	$shoppingcart_info = "";
	$totalPrice = 0;
	$cart_info = json_decode($_POST["cart"],true);
	// $back = $cart_info["2"];
	$db = ierg4210_DB();
	$sql = $db->prepare("SELECT name, price FROM products WHERE pid = ?");
	foreach($cart_info as $k=>$v){
		$number = (int)$cart_info[$k];
		$k = (int)$k;
		$sql-> execute(array($k));
		if($r = $sql -> fetch()){
			$name = $r['name'];
			$price = $r['price'];
			$totalPrice+=$price*$number;
			$shoppingcart_info.=$name.'&'.$price.'&'.$number.'|';
		}
	}
	$currency = "HKD";
	$t = json_decode(stripslashes($_COOKIE['t4210']),true);
	$email = $t['em'];
	$tranid = "notyet";
	$digest = sha1($currency.$email.$salt.$shoppingcart_info.$totalPrice);
	$sql = "INSERT INTO orders (email, digest, salt, tranid) VALUES (?,?,?,?);";
	$q = $db->prepare($sql);
    $q->bindParam(1, $email);
    $q->bindParam(2, $digest);
    $q->bindParam(3, $salt);
    $q->bindParam(4, $tranid);
    $q->execute();
    $invoice  = $db->lastInsertId();
    $returnval = json_encode(array("digest"=>$digest, "invoice"=>$invoice));
	return $returnval;
}
//莫名其妙有问题
function order_insert(){
	$db = ierg4210_DB();
	$sql = "INSERT INTO orders (email, digest, salt, tranid) VALUES (?,?,?,?);";
	$q = $db->prepare($sql);
    $q->bindParam(1, $email);
    $q->bindParam(2, $digest);
    $q->bindParam(3, $salt);
    $q->bindParam(4, $tranid);
    $q->execute();
    $lastId = $db->lastInsertId();
    return $lastId;
}
echo genDigest();

// ob_flush();
// flush();
// sleep(5);


?>