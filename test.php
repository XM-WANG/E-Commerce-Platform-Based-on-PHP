<?php 
header("Content-type:text/html;charset=utf-8");
include_once('lib/db.inc.php');
global $db;
    $db = ierg4210_DB();
    $q=$db->prepare('SELECT * FROM user WHERE email = ?');
    $q->execute(array($email));
    if($r=$q->fetch()){
        $salt = $r['salt'];
        // $resetFinalPassword = hash_hmac('sha256', $resetPassword, $salt);
        // $sql = "UPDATE user SET passwd = ? WHERE email = $email";
        // $a = $db->prepare($sql);
        // $a->bindParam(1,$resetFinalPassword);
        // $a->execute();
        echo $salt;
    }
 ?>