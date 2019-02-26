<?php 
include_once('../lib/db.inc.php');
function history_fetch(){
    $t = json_decode(stripslashes($_COOKIE['t4210']),true);
    $email = $t['em'];
    global $db;
    $db = ierg4210_DB();
    $q = $db->prepare("SELECT * FROM orders WHERE email=? ORDER BY oid DESC LIMIT 5;");
    $q-> execute(array($email));
    $r = $q -> fetchAll();
    return $r;
}
// var_dump($r);
?>