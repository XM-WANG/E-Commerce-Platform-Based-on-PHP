<?php
include_once('session-auth.php');
$em = ierg4210_Session();
if($em==null){
	echo "<script>alert('Failed to pass the validation!');";
	echo "window.location.href='Login.php'</script>";
	exit();
}else{
	$db = ierg4210_DB();
	$q = $db->prepare('SELECT * FROM user WHERE email = ?;');
	$q-> execute(array($em));
	$r = $q -> fetch();
	if($r['right']!=1){
		adminProcess();
		header('Location:index.php',true,302);
	}else{
		adminProcess();
		header('Location:admin.php',true,302);
	}
}
function adminProcess(){
	include_once('lib/db.inc.php');

	header('Content-Type: application/json');

	// input validation
	if (empty($_REQUEST['action']) || !preg_match('/^\w+$/', $_REQUEST['action'])) {
		echo json_encode(array('failed'=>'undefined'));
		exit();
	}

	// The following calls the appropriate function based to the request parameter $_REQUEST['action'],
	//   (e.g. When $_REQUEST['action'] is 'cat_insert', the function ierg4210_cat_insert() is called)
	// the return values of the functions are then encoded in JSON format and used as output
	try {

		if (($returnVal = call_user_func('ierg4210_' . $_REQUEST['action'])) === false) {
			if ($db && $db->errorCode()) 
				error_log(print_r($db->errorInfo(), true));
			echo json_encode(array('failed'=>'1'));
		}
		echo 'while(1);' . json_encode(array('success' => $returnVal));
	} catch(PDOException $e) {
		error_log($e->getMessage());
		echo json_encode(array('failed'=>'error-db'));
	} catch(Exception $e) {
		echo 'while(1);' . json_encode(array('failed' => $e->getMessage()));
	}
}
?>