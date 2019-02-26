<?php
include_once('../lib/db.inc.php');
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
			$name = $r['name']; //商品名称
			$price = $r['price'];
			$totalPrice+=$price*$number; //总价格
			$shoppingcart_info.=$name.'&'.$price.'&'.$number.'|';
		}
	}
	$currency = "HKD";
	$t = json_decode(stripslashes($_COOKIE['t4210']),true);
	$email = $t['em'];
	$digest = sha1($currency.$email.$salt.$shoppingcart_info.$totalPrice); //订单号
	$returnval = json_encode(array("name"=>$name, "totalPrice"=>$totalPrice,"tid"=>$digest));
	return $returnval;
	// return $back;
}
function order_insert($email,$digest,$salt,$tranid){
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
?>
