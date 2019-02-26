<?php
function ierg4210_DB() {
	// connect to the database
	// TODO: change the following path if needed
	// Warning: NEVER put your db in a publicly accessible location
	$db = new PDO('sqlite:E:/wamp/www/cart.db');
	
	// enable foreign key support
	$db->query('PRAGMA foreign_keys = ON;');

	// FETCH_ASSOC: 
	// Specifies that the fetch method shall return each row as an
	// array indexed by column name as returned in the corresponding
	// result set. If the result set contains multiple columns with
	// the same name, PDO::FETCH_ASSOC returns only a single value
	// per column name. 
	$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

	return $db;
}
function ierg4210_cat_fetchall() {
    // DB manipulation
    global $db;
    $db = ierg4210_DB();
    $q = $db->prepare("SELECT * FROM categories LIMIT 100;");
    if ($q->execute())
        return $q->fetchAll();
}

// Since this form will take file upload, we use the tranditional (simpler) rather than AJAX form submission.
// Therefore, after handling the request (DB insert and file copy), this function then redirects back to admin.html
function ierg4210_prod_insert() {
    // input validation or sanitization

    // DB manipulation
    global $db;
    $db = ierg4210_DB();

    // TODO: complete the rest of the INSERT command
    if (!preg_match('/^\d*$/', $_POST['catid']))
        throw new Exception("invalid-catid");
    $_POST['catid'] = (int) $_POST['catid'];
    if (!preg_match('/^[\w\- ]+$/', $_POST['name']))
        throw new Exception("invalid-name");
    if (!preg_match('/^[\d\.]+$/', $_POST['price']))
        throw new Exception("invalid-price");
    if (!preg_match('/^[\w\- ]+$/', $_POST['description']))
        throw new Exception("invalid-textt");


    // Copy the uploaded file to a folder which can be publicly accessible at incl/img/[pid].jpg
    if ($_FILES["file"]["error"] == 0
        && $_FILES["file"]["type"] == "image/jpeg"
        && mime_content_type($_FILES["file"]["tmp_name"]) == "image/jpeg"
        && $_FILES["file"]["size"] < 5000000) {


        $catid = $_POST["catid"];
        $name = $_POST["name"];
        $price = $_POST["price"];
        $desc = $_POST["description"];
        $sql="INSERT INTO products (catid, name, price, description) VALUES (?, ?, ?, ?);";
        $q = $db->prepare($sql);
        $q->bindParam(1, $catid);
        $q->bindParam(2, $name);
        $q->bindParam(3, $price);
        $q->bindParam(4, $desc);
        $q->execute();
        $lastId = $db->lastInsertId();

        // Note: Take care of the permission of destination folder (hints: current user is apache)
        if (move_uploaded_file($_FILES["file"]["tmp_name"], "images/" . $lastId . ".jpg")) {
            // redirect back to original page; you may comment it during debug
            header('Location: admin.php');
            exit();
        }
    }
    // Only an invalid file will result in the execution below
    // To replace the content-type header which was json and output an error message
    header('Content-Type: text/html; charset=utf-8');
    echo 'Invalid file detected. <br/><a href="javascript:history.back();">Back to admin panel.</a>';
    exit();
}


// TODO: add other functions here to make the whole application complete
function ierg4210_cat_insert() {
    global $db;
    $db = ierg4210_DB();

    if (!preg_match('/^[\w\- ]+$/', $_POST['name']))
        throw new Exception("invalid-name");

    $name = $_POST["name"];
    $sql = "INSERT INTO categories (name) VALUES (?)";
    $q = $db->prepare($sql);
    $q->bindParam(1, $name);
    $q->execute();
    header('Location: adminCat.php');
}

function ierg4210_cat_edit() {
    global $db;
    $db = ierg4210_DB();
    if (!preg_match('/^[\w\- ]+$/', $_POST['name']))
        throw new Exception("invalid-name");
    
    $catid = $_POST["catid"];
    $name = $_POST["name"];
    $sql = "UPDATE categories SET name = ? WHERE catid = $catid";
    $q = $db->prepare($sql);
    $q->bindParam(1, $name);
    $q->execute();
    header('Location: adminCat.php');
}

function ierg4210_cat_delete(){
    global $db;
    $db = ierg4210_DB();

    if (!preg_match('/^\d*$/', $_POST['catid']))
        throw new Exception("invalid-catid");
    $_POST['catid'] = (int) $_POST['catid'];
    
    $catid = $_POST["catid"];
    $sql = "DELETE FROM categories WHERE catid = ?";
    $q = $db->prepare($sql);
    $q->bindParam(1, $catid);
    $q->execute();
    header('Location: adminCat.php');  
}
function ierg4210_prod_delete_by_pid(){
    global $db;
    $db = ierg4210_DB();

    if (!preg_match('/^\d*$/', $_POST['pid']))
        throw new Exception("invalid-pid");
    $_POST['pid'] = (int) $_POST['pid'];
    
    $pid = $_POST["pid"];
    $sql = "DELETE FROM products WHERE pid = ?";
    $q = $db->prepare($sql);
    $q->bindParam(1, $pid);
    $q->execute();
    header('Location: admin.php');    
}
function ierg4210_prod_fetchAll(){
    global $db;
    $db = ierg4210_DB();
    $q = $db->prepare("SELECT * FROM products LIMIT 100;");
    if ($q->execute())
        return $q->fetchAll();
}


function ierg4210_prod_fetchOne(){
    global $db;
    $db = ierg4210_DB();
    $pid = $_POST["pid"];
    $q = $db->prepare("SELECT * FROM products WHERE pid = $pid;");
    if ($q->execute())
        return $q->fetchAll();
}

function ierg4210_prod_edit() {
    global $db;
    $db = ierg4210_DB();

     if (!preg_match('/^\d*$/', $_POST['catid']))
        throw new Exception("invalid-catid");
    $_POST['catid'] = (int) $_POST['catid'];
    if (!preg_match('/^[\w\- ]+$/', $_POST['name']))
        throw new Exception("invalid-name");
    if (!preg_match('/^[\d\.]+$/', $_POST['price']))
        throw new Exception("invalid-price");
    if (!preg_match('/^[\w\- ]+$/', $_POST['description']))
        throw new Exception("invalid-textt");


    // Copy the uploaded file to a folder which can be publicly accessible at incl/img/[pid].jpg
    if ($_FILES["file"]["error"] == 0
        && $_FILES["file"]["type"] == "image/jpeg"
        && mime_content_type($_FILES["file"]["tmp_name"]) == "image/jpeg"
        && $_FILES["file"]["size"] < 5000000) {

        $pid  = (int)$_POST["pid"];
        $catid = $_POST["catid"];
        $name = $_POST["name"];
        $price = $_POST["price"];
        $desc = $_POST["description"];
        $sql="UPDATE products SET catid= ?, name= ?,price= ? ,description= ? WHERE pid=$pid";
        $q = $db->prepare($sql);
        $q->bindParam(1, $catid);
        $q->bindParam(2, $name);
        $q->bindParam(3, $price);
        $q->bindParam(4, $desc);
        $q->execute();
        // Note: Take care of the permission of destination folder (hints: current user is apache)
        if (move_uploaded_file($_FILES["file"]["tmp_name"], "images/" . $pid . ".jpg")) {
            // redirect back to original page; you may comment it during debug
            header('Location: admin.php');
            exit();
        }
    }
    // Only an invalid file will result in the execution below
    // To replace the content-type header which was json and output an error message
    header('Content-Type: text/html; charset=utf-8');
    echo 'Invalid file detected. <br/><a href="javascript:history.back();">Back to admin panel.</a>';
    exit();
}
// function emailExit(){
//     global $db;
//     $db = ierg4210_DB();
//     $email ="'".(string)$_POST["UserEmail"]."'";
//     $sql = "SELECT * FROM user WHERE email = $email;";
//     $q = $db->prepare($sql);
//     if ($q->execute())
//         return $q->fetchAll();
// }
// function ierg4210_reg(){
//     global $db;
//     $db = ierg4210_DB();
//     if (!preg_match('/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-]{2,3})+/', $_POST['UserEmail']))
//         throw new Exception("invalid-email!");
//     $res = emailExit();
//     if($res != null){
//         header('Location: reg.php');
//         exit();
//         // header("Location: index.php");
//     }
//     $password = $_POST["UserPassword1"];
//     $right = 0;
//     $email = $_POST["UserEmail"];
//     $salt = mt_rand();
//     $pw = hash_hmac('sha256',$password,$salt);
//     $sql="INSERT INTO user (right, email, salt, passwd) VALUES (?, ?, ?, ?);";
//     $q = $db->prepare($sql);
//     $q->bindParam(1, $right);
//     $q->bindParam(2, $email);
//     $q->bindParam(3, $salt);
//     $q->bindParam(4, $pw);
//     $q->execute();
//     header('Location: login.php');
//     exit();
// }
function ierg4210_change(){
    global $db;
    $db = ierg4210_DB();
    $email = "'".$_POST["UserEmail"]."'";
    $passwd = $_POST["UserPassword2"];
    $salt = mt_rand();
    $pw = hash_hmac('sha256',$passwd,$salt);
    $sql = "UPDATE user SET salt= ?, passwd= ? WHERE email=$email;";
    $q = $db->prepare($sql);
    $q->bindParam(1, $salt);
    $q->bindParam(2, $pw);    
    $q->execute();
    header('Location: logoutBack.php');
    exit();
}
