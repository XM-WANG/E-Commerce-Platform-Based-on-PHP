<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>register</title>
<script src="jquery-3.3.1.min.js"></script>
<script language=javascript>


function chkpassword(){
	if(document.subform.UserPassword1.value.length<6){
		document.getElementById("pwd_txtw").innerHTML="length mismatch!";
		document.getElementById("pwd_txt").innerHTML="";		
		document.getElementById("reg_submit").disabled=true;
        document.subform.UserPassword1.focus();
        return false;
    }else{
		document.getElementById("pwd_txtw").innerHTML="";
		document.getElementById("pwd_txt").innerHTML="√";
		document.getElementById("reg_submit").disabled=false;
	} 
}

function chkpassword2(){
	if(document.subform.UserPassword1.value != document.subform.UserPassword2.value){
		document.getElementById("pwd2_txt").innerHTML="";
		document.getElementById("pwd2_txtw").innerHTML="two passwords do not match!";
		document.getElementById("reg_submit").disabled=true;
        document.subform.UserPassword1.focus();
        return false;
    }else{
    	document.getElementById("pwd2_txtw").innerHTML="";
		document.getElementById("pwd2_txt").innerHTML="√";
		document.getElementById("reg_submit").disabled=false;
	}
}

function chkemail(){
	var userEmail=document.subform.UserEmail.value;
	if(userEmail!=""){
		var reyx= /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-]{2,3})+/;
        if(!reyx.test(userEmail)){
        	document.getElementById("email_txt").innerHTML="";
			document.getElementById("email_txtw").innerHTML="wrong email format!";
			document.getElementById("reg_submit").disabled=true;
			document.subform.UserEmail.focus();
			return false;
		}else{
			document.getElementById("email_txtw").innerHTML="";
			document.getElementById("email_txt").innerHTML="√";
			document.getElementById("reg_submit").disabled=false;
		}
	}
}

function chkform() {

    if(document.subform.UserPassword1.value=="" ){
    	document.getElementById("pwd_txt").innerHTML="";
		document.getElementById("pwd_txtw").innerHTML="length mismatch!";
		document.getElementById("reg_submit").disabled=true;
        document.subform.UserPassword1.focus();
        return false;
    }else{
    	document.getElementById("pwd_txtw").innerHTML="";
		document.getElementById("pwd_txt").innerHTML="√";
		document.getElementById("reg_submit").disabled=false;
	}

    if(document.subform.UserPassword1.value != document.subform.UserPassword2.value){
		document.getElementById("pwd2_txt").innerHTML="";
		document.getElementById("pwd2_txtw").innerHTML="two passwords do not match!";
		document.getElementById("reg_submit").disabled=true;
        document.subform.UserPassword1.focus();
        return false;
    }else{
    	document.getElementById("pwd2_txtw").innerHTML="";
		document.getElementById("pwd2_txt").innerHTML="√";
		document.getElementById("reg_submit").disabled=false;
	}

	if(document.subform.UserEmail.value ==""){
		document.getElementById("email_txt").innerHTML="";
		document.getElementById("email_txtw").innerHTML="empty!";
		document.getElementById("reg_submit").disabled=true;
        document.subform.UserEmail.focus();
        return false;}else{
		var userEmail=document.subform.UserEmail.value;
		var reyx= /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-]{2,3})+/;
        if(!reyx.test(userEmail)){
        	document.getElementById("email_txt").innerHTML="";
			document.getElementById("email_txtw").innerHTML="wrong email format!";
			document.getElementById("reg_submit").disabled=true;
			document.subform.UserEmail.focus();
			return false;
		}else{
			document.getElementById("email_txtw").innerHTML="";
			document.getElementById("email_txt").innerHTML="√";
			document.getElementById("reg_submit").disabled=false;
		}
	}
	
	return true;   
}
</script>

<style>
body{ margin:0; padding:0;}
ul,li,h2,p,input,div,h3{margin:0; padding:0; list-style:none;}
.info_txt{color:rgb(40, 167, 69);font-size:12px;height:40px; width: 10px;}
.info_txt2{color:red; display: block; margin-left:30px; margin-top: 10px; font-size:12px;height: 10px; width: 100%;}
body{width:100%;height:100%;background: url('img/star.jpg') ; background-size: 100%;}
#box{ padding:10px; border:1px solid #aaaaaa; width:430px; height: 480px; background-color:#fff; margin:20px auto; margin-top: 80px; position: relative; border-radius: 5px;}
h1{ margin-left:30px; margin-top:30px; margin-bottom: 30px; font-size: 30px; font-weight: 800; width: 100%; height: 25px;line-height: 25px; text-align: left; color: #000;}
.tag{ margin-top:10px;margin-left:30px; width: 100%; height: 20px; line-height: 20px; font-size: 16px; display: inline-block; color: rgb(88, 96, 105);}
input{height: 40px; width:360px; border:1px solid #ccc; border-radius: 3px; margin-left:30px; font-size: 14px;margin-top:10px;}
#reg_submit{background-color:rgb(40, 167, 69); color: white; height: 60px; border-radius: 7px; margin-top: 20px;}
.logo{ width:100%; height:50px; margin-top:30px; margin-left: 30px;}
.logo img{ height: 30px; width: 70px; }
</style>
</head>

<body>
<div class="logo"><a href="index.php"><img src="img/lol-logo-w-s.png"/></a></div>
<div id= "box">
<form method=post action="regBack.php" name="subform" onsubmit="return chkform();">
	<h1>REGISTER</h1>
	<p class="tag">Email:</p>                
	<input name="UserEmail" onChange="chkemail()">
	<span class="info_txt" id="email_txt"></span>
	<span class="info_txt2" id = "email_txtw"></span>			
	<p class="tag">password (at least 6 bytes):</p>                
	<input name="UserPassword1" type="password" onChange="chkpassword()">
	<span class="info_txt" id="pwd_txt"></span>
	<span class="info_txt2" id="pwd_txtw"></span>	
	<p class="tag">password confirmation:</p>                
	<input name="UserPassword2" type="password" onChange="chkpassword2()">
	<span class="info_txt" id="pwd2_txt"></span>
	<span class="info_txt2" id="pwd2_txtw"></span>			
	<input type="submit" value="register" id="reg_submit">
</form>
</div>
</body>
</html>