
<?php
require __DIR__.'/lib/db.inc.php'; 
function randomkeys()   
{   
	$key="";
	$num="";
	$alp="";
	$newstring='';
    $pattern1 = '1234567890';
    $pattern2 ='ABCDEFGHIJKLOMNOPQRSTUVWXYZ';  
    for($i=0;$i<13;$i++)
    {   
        $num .= $pattern1{mt_rand(0,9)};
    }
    for($i=0;$i<3;$i++)
    {   
        $alp .= $pattern2{mt_rand(0,25)};
    }
    for($i=0;$i<3;$i++)
    {
    	$a = mt_rand(0,12);
    	$num1 = substr($num,0,$a);
    	$num2 = substr($num,$a);
    	$newstring = $num1.substr($alp,$i,1).$num2;
    	$num = $newstring;

    }    
    return $newstring;   
}
function edit($a) {
	$db = ierg4210_DB();
    $b= $db->prepare("SELECT oid from orders order by oid desc limit 1;");
	$b->execute();
	$c = $b->fetchAll();
    $oid = $c[0]['oid'];
    $tranid = $a;
    $sql = "UPDATE orders SET tranid = ? WHERE oid = $oid";
    $q = $db->prepare($sql);
    $q->bindParam(1, $tranid);
    $q->execute();
}
$a = randomkeys();
edit($a);
 ?>