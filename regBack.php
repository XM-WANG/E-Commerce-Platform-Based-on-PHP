<?php 
require __DIR__.'/lib/db.inc.php';
function emailExit(){
    global $db;
    $db = ierg4210_DB();
    $email ="'".(string)$_POST["UserEmail"]."'";
    $sql = "SELECT * FROM user WHERE email = $email;";
    $q = $db->prepare($sql);
    if ($q->execute())
        return $q->fetchAll();
}
function ierg4210_reg(){
    global $db;
    $db = ierg4210_DB();
    if (!preg_match('/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-]{2,3})+/', $_POST['UserEmail']))
        throw new Exception("invalid-email!");
    $res = emailExit();
    if($res != null){
        echo "<script>window.location.href='reg.php';";
		echo "alert('This email is exit!');</script>";
        exit();
    }
    $password = $_POST["UserPassword1"];
    $right = 0;
    $email = $_POST["UserEmail"];
    $salt = mt_rand();
    $pw = hash_hmac('sha256',$password,$salt);
    $sql="INSERT INTO user (right, email, salt, passwd) VALUES (?, ?, ?, ?);";
    $q = $db->prepare($sql);
    $q->bindParam(1, $right);
    $q->bindParam(2, $email);
    $q->bindParam(3, $salt);
    $q->bindParam(4, $pw);
    $q->execute();
    header('Location: login.php');
    exit();
}
ierg4210_reg();
 ?>