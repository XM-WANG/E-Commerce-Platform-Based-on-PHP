<?php 
include_once('adminOrdersBack.php');
$res = orders_fetchall();
$record = '';
foreach ($res as $value){
	$record .= 
		"
		<tr>
		<td class='oid'>".$value['oid']."</td>
		<td class='email'>".$value['email']."</td>
		<td class='digest'>".$value['digest']."</td>
		<td class='salt'>".$value['salt']."</td>
		<td class='tid'>".$value['tranid']."</td>
		</tr>
		";
		   	
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style type="text/css">
		body,table,tr,td,th,h3{padding: 0;margin:0; overflow: hidden;overflow: hidden;}
		table{width: 80%; height: auto; margin:0 auto; border: 1px solid #000;}
		tr{ width: 100%; height: 20px; border:0; }
		th,td{ width: 20%; height: 18px; border: 1px solid #000; overflow: hidden;}
		th{background: #ccc;}
		h3{width:170px;margin:20px auto 10px; }
		td{text-align: center; line-height: 18px;}
		.oid{width: 10%;}
		.email{width: 20%;}
		.salt{width: 20%;}
		.digest{width: 30%; overflow:auto ;}
		.tid{width: 20%; overflow:auto;}
		#link{margin-left: 83%;}
		#logout{margin-top: 10px;}
	</style>
</head>
<body>
<h3>Orders Management</h3>
<table  border="0" cellspacing="0" cellpadding="0" style="table-layout:fixed;">
	<tr>
		<th class='oid'>Order ID</th>
		<th class='email'>Email</th>
		<th class='digest'>Digest</th>
		<th class='salt'>Salt</th>
		<th class='tid'>Transaction ID</th>
	</tr>
	<!-- <tr>
		<td class='oid'>123</td>
		<td class='email'>234</td>
		<td class='digest'>456</td>
		<td class='salt'>789</td>
		<td class='tid'>110</td>
	</tr> -->
	<?php echo $record; ?>

</table>
<center><a href="../logoutBack.php"><button id="logout">Logout</button></a></center><br>
<a href="../admin.php" id="link">Manage Products</a>	
</body>
</html>