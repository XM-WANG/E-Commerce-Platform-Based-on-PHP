<?php
	session_start(); 
	function csrf_getNonce($action){
		$nonce = mt_rand().mt_rand();
		if(!isset($_SESSION['csrf_nonce']))
			$_SESSION['csrf_nonce'] = array();
		$_SESSION['csrf_nonce'][$action]=$nonce;
		return $nonce;
	}
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Login</title>
	<style type="text/css">
		body,h1,p,input,div,span{margin:0; padding:0; list-style:none;}
		#box{ padding:10px; border:1px solid #aaaaaa; width:430px; height: 460px; background-color:#fff; margin:20px auto; margin-top: 80px; position: relative; border-radius: 5px;}
		h1{ margin-left:30px; margin-top:30px; margin-bottom: 30px; font-size: 30px; font-weight: 800; width: 100%; height: 25px;line-height: 25px; text-align: left; color: #000;}
		input{height: 40px; width:360px; border:1px solid #ccc; border-radius: 3px; margin-left:30px; font-size: 14px;margin-top:10px;}
		p{margin-top: 20px; margin-left:30px; width: 100%; height: 20px; line-height: 20px; font-size: 16px; display: inline-block; color: rgb(88, 96, 105);}
		.notBtn{height:16px; width: 100px;} 
		#adminForm{display: none;}
		span{cursor: pointer;}
		#box #cat{ margin-left: 75px; padding: 0; width: 380px; margin-top: 40px;}
		.s2{margin-left:40px; margin-right: 40px;}
		#dec{ height: 50px; width: 100%; background: #090723; }
		body{width:100%;height:100%;background: url('img/star.jpg'); background-size: 100%;}
		.put{ height: 40px; width:360px; border:1px solid #ccc; border-radius: 3px; margin-left:30px;}
		.btn{background-color:rgb(40, 167, 69); color: white; height: 60px; border-radius: 7px; margin-top: 30px;}
		#s1{color:#b3b3b3; text-decoration:none; cursor: default;}
		a:link,a:visited,a:hover,a:active{text-decoration: none;color:inherit;}
		#reg{padding:0;margin:0;width: 100%; text-align: right; margin-top:20px;}
		.achange{margin-top:5px;width: 390px; text-align: right; margin-right:50px; display: block;}
		.achange:link,.achange:visited{color:#000;text-decoration:none;}
		.achange:hover{ color:#ccc;text-decoration:none; }
		.logo{ width:100%; height:50px; margin-top:30px; margin-left: 30px;}
		.logo img{ height: 30px; width: 70px; }
	</style>
</head>
<body bgcolor="#FFFFFF">
	<!-- <div id = "dec"></div> -->
	<div class="logo"><a href="index.php"><img src="img/lol-logo-w-s.png"/></a></div>
	<div id="box">
		<h1>Users Login</h1>
		<form action="loginBack.php?action=<?php echo ($action = 'cat_insert'); ?>" method="POST" calss="loginForm" id = "userForm">
			<input type="hidden" readonly="readonly" name="right" value="0" id = "right">
			<p>Email:</p><input type="email" name="em" title="valid email" required="true" pattern=" /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/"/><br>
			<p>PassWord：</p><input type="password" name="pw" title="valid password" required="true"/><br>
			<!-- <a class = "achange" href="change.html">change your password</a> -->
			<input type="hidden" name="nonce" value="<?php echo csrf_getNonce($action); ?>"/>
			<input type="submit" class="btn" value="Login">
		</form>
		<p id = "cat"><span id = "s1">user</span><span class = "s2">|</span><span id = "s3">admin</span><span class = "s2">|</span><a href="reg.php"><span id ="reg">register</span></a></p>
		
	</div>
</body>
</html>
<script src="jquery-3.3.1.min.js"></script>
<script type="text/javascript">
	$('#s1').click(function(){
		$('form').attr('id','userForm');
		$('#right').attr('value','0');
		$('h1').html("Users Login");
		$('#s1').css({
			'color':'#b3b3b3',
			'cursor':'default'
		})
		$('#s3').css({
			'color':'#000',
			'cursor':'pointer'
		})

	})

	$('#s3').click(function(){
		$('form').attr('id','adminForm');
		$('#right').attr('value','1');
		$('#adminForm').show();
		$('#userForm').hide()
		$('h1').html("Admin Login");
		$('#s3').css({
			'color':'#b3b3b3',
			'cursor':'default'
		})
		$('#s1').css({
			'color':'#000',
			'cursor':'pointer'
		})
	})
</script>
<!-- <script type="text/javascript">
	//validation for user form.
	var loginForm = document.getElementById('userForm');
	if(!loginForm.checkValidity || loginForm.noValidate)
	
	loginForm.onsubmit =function(){
		
		function displayErr(el,msg){
			alert('FieldError: '+ msg);
			el.focus();
			return false
		}

		for(var i =0, p, el, els =this.elements; el = els[i]; i++){
			if(el.hasAttribute('required') && el.value =='')
				return displayErr(el, el.title +' is required');
			if((p = el.getAttribute('pattern')) && !new RegExp(p).test(el.value))
				return displayErr(el,'in'+ el.title);
		}
	}
</script> -->