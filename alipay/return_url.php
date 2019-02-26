
<?php
require '..\lib\db.inc.php';
/* *
 * 功能：支付宝页面跳转同步通知页面
 * 版本：2.0
 * 修改日期：2017-05-01
 * 说明：
 * 以下代码只是为了方便商户测试而提供的样例代码，商户可以根据自己网站的需要，按照技术文档编写,并非一定要使用该代码。

 *************************页面功能说明*************************
 * 该页面可在本机电脑测试
 * 可放入HTML等美化页面的代码、商户业务逻辑程序代码
 */
require_once("config.php");
require_once 'pagepay/service/AlipayTradeService.php';
$arr=$_GET;
$digest = $arr['sign'];
$tranid = $arr["out_trade_no"];
$t = json_decode(stripslashes($_COOKIE['t4210']),true);
$email = $t['em'];
$salt = "NA";
$db = ierg4210_DB();
$sql = "INSERT INTO orders (email, digest, salt, tranid) VALUES (?,?,?,?);";
$q = $db->prepare($sql);
$q->bindParam(1, $email);
$q->bindParam(2, $digest);
$q->bindParam(3, $salt);
$q->bindParam(4, $tranid);
$q->execute();

header('Location:../Ltd.php',true,302);
?>

