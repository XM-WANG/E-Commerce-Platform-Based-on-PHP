<?php

include_once('lib/db.inc.php');
$email = $_REQUEST['email'];
$resetPassword = $_REQUEST['resetPassword'];
echo "Your resetPassword is".$resetPassword;
$db = ierg4210_DB();
$q=$db->prepare('SELECT * FROM user WHERE email = ?');
$q->execute(array($email));
if($r=$q->fetch()){
    $salt = $r['salt'];
    $resetFinalPassword = hash_hmac('sha256',$resetPassword,$salt);
    $sql2 = "UPDATE user SET passwd = ? WHERE email = '$email';";
    $db = ierg4210_DB();
    $q = $db->prepare($sql2);
    $q->bindParam(1,$resetFinalPassword);
    $q->execute();
}

?>