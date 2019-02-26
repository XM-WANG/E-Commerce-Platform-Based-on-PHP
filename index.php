<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>index</title>
<link href="css/index.css" rel="stylesheet" type="text/css"> 
<script src="js/index.js"></script>
<script src="jquery-3.3.1.min.js"></script>

</head>
<body>
<div class="back">
    <div class="top">
        <div class="logo"><a href="index.php"><img src="img/lol-logo-w-s.png"/></a></div>
        <div class="search">
            <a href="#" class="asearch"><img class="isearch-l" src="img/searchleft.png"/></a> 
            <input type="text" value="Search for..." name="search" class="input">
            <a href="#" class="asearch"><img class="isearch-r" src="img/searchright.png"/></a>    
        </div>
        <div class="account">
            <a href="login.php"><img src="img/account.png"/></a>
            <div id="info">Please Login</div>   
        </div>
        <div class="cart">
            <a href="#"><img src="img/cart.png"/></a>
            <div id="shoppingList">
                <span class="def">NO ITEM</span>
                <!-- <form method="POST" action="#" id ="sForm" onsubmit="return mysubmit(this);"> -->
                <ul>
                    <li id="header">-------My Shopping List-------</li>
                </ul>
                <hr>
                <div id="totally"><span>TOTALLY:</span><span id="duoShou"></span></div>
                <form method="POST" action="https://www.sandbox.paypal.com/cgi-bin/websrc.php" id ="sForm" onsubmit="return mysubmit(this)">
                    <input type="hidden" name="cmd" value="_cart">
                    <input type="hidden" name="upload" value="1">
                    <input type="hidden" name="business" value="1155121439-facilitator@link.cuhk.edu.hk">
                    <input type="hidden" name="currency_code" value="HKD">
                    <input type="hidden" name="charset" value="utf-8">
                    <input type="hidden" name="custom" value="0">
                    <input type="hidden" name="invoice" value="0">
                    <input id="btncheckout" type="submit" value="Paypal" class="payBtn">
                </form>
                <form name="alipayment" id = "alipayment" action="alipay/pagepay/pagepay.php" method="POST" onsubmit="return mysubmitAli()">
                    <input id="alipaybtn" type="submit" value="Alipay" class="payBtn">
                </form>
            </div>
        </div>
        <div class="mylist">
            <a href="#"><img src='img/mylist.png'/></a>
        </div>        
    </div>
</div>

<div class="plist">
    <div class="plogo">
        <img src='img/shop.png'/>
    </div>
    <ul class="ulist">
        <li id="lpl">
            <a href="#">LPL Team Souvenir</a>
            <div class="hiddenBox" id="lplHidden">
                <ul>
                    <li><a>SNG  TEAM</a></li>
                    <li><a>OMG  TEAM</a></li>
                    <li><a>RNG  TEAM</a></li>
                    <li><a>EDG  TEAM</a></li>
                    <li><a>RW  TEAM</a></li>
                </ul>
                <div></div>
            </div>
        </li>
        <li class="vt">|</li>
        <li id="gk">
            <a href="Ltd.php" target="_blank">Garage Kits</a>
            <div class="hiddenBox" id="gkHidden">
                <ul>
                    <li><a href="Ltd.php" target="_blank">Ltd Edition</a></li>
                    <li><a>small-sized</a></li>
                    <li><a>medium-sized</a></li>
                    <li><a>large-sized</a></li>
                </ul>
                <div></div>
            </div>
        </li>
        <li class="vt">|</li>
        <li><a href="#">Plush Toy</a></li>
        <li class="vt">|</li>
        <li><a href="#">Fashion Dress</a></li>
        <li class="vt">|</li>
        <li><a href="#">Daily Use</a></li>
        <li class="vt">|</li>
        <li><a href="#">Others</a></li>        
    </ul>
</div>

<nav class="nvBar">
    <a href="#">Home</a>
</nav>

<div class="slide">
	<img src="img/promotion.jpg"/>
</div>
<div class="rec">
	<h3>RECOMMENDED FOR YOU</h3>
    <a href="#">
		<div class="out">
           	<img src="img/weijia250.png"/>
            <p class="r-name">Veigar Garage Kit</p>
        	<p class="price">500$</p>
        </div>
	</a>
    <a href="#">
        <div class="out">
        	<img src="img/yasuo250.png"/>
            <p class="r-name">Yasuo Garage Kit</p>
        	<p class="price">500$</p>
        </div>
    </a>
    <a href="#">
        <div class="out">
        	<img src="img/qianjue250.png"/>
            <p class="r-name">Kindred Garage Kit</p>
            <p class="price">500$</p>
        </div>
    </a>
	<a href="#">
    	<div class="out">
			<img src="img/bulong250.png"/>
            <p class="r-name">Braum Garage Kit</p>
        	<p class="price">500$</p>
        </div>
	</a>
</div>
</body>
</html>
<script type="text/javascript">
$(function(){
    // control the hover style
    $('.account').mouseover(function(){
        $('#info').show();
    }).mouseout(function(){
        $('#info').hide();
    });
    //ajax
    var a=$.ajax({
        url:"session-auth.php?flag='a'",
        type:"GET",
        dataType:"text",
        async: false
    }).responseText;
    a = a.replace(/\s+/g,"");
    if(a==''){
        //control the click function
        $('#info').click(function(){
        window.location.href = "login.php";
    })
    }else{
        var b = ""+a+"";
        $('#info').html('<div id="photo"></div>'+a+'<br><span id="change"><a href="change-auth.php?email='+b+'">[change password]</a>&nbsp&nbsp<a href="logoutBack.php">[logout]</a></span>');
        $('#info').css({
            "width":"180px",
            "height":"250px",
            "right":"-50px",
            "line-height":"40px",
            "color":"#333",
            "padding-left":"10px"
        });
        // $("#info").on('click','#logout',function(){
        //     var b=$.ajax({
        //         url:"logoutBack.php",
        //         type:"GET",
        //         dataType:"text",
        //         async: false
        //     });
        // })
    }
    $('.cart').mouseover(function(){
        $('#shoppingList').show();
    }).mouseout(function(){
        $('#shoppingList').hide();
    });
    $("#shoppingList ul").on('click','li .count .plus',function(){
        var n = parseInt($(this).siblings('.mid').text());
        var pid = $(this).parent().parent().val();
            // console.log(pid);
        n+=1;
        $(this).siblings('.mid').html(n);
        Sum();
           changeLocal(pid,n);                   
    })
        // decrease the number
    $("#shoppingList ul").on('click','li .count .subtract',function(){
        var n = parseInt($(this).siblings('.mid').html());
        var pid = $(this).parent().parent().val();
            // console.log(pid);
        n-=1;
        if(n <= 0){
            $(this).parent().parent().remove();
            clearLocal(pid);
            Sum();
        }else{
            $(this).siblings('.mid').html(n);
            Sum();
            changeLocal(pid,n);
        }
        empty();
    })
        // get the totally cost of the products
    var Sum = function(){
        var sum = 0;
        $(".cost").each(function(){
            var pr = parseFloat($(this).html());
            var number = parseInt($(this).siblings(".count").children(".mid").html());
            sum=sum+pr*number;
        })
        $("#duoShou").html("HK$"+sum);
    }
        // if shopping list is empty recover the initial appearance.
    var empty=function(){
        var numLi = $('#shoppingList ul').children('li');
        if(numLi.length<=1){ 
            $('#header').hide();
            $('#totally').hide();
            $('hr').hide();
            $('.def').show();
        }
    }
    var changeLocal = function(a,b){
        var pid = a;
        var number =b;
            // console.log(pid);
            // console.log(number);
        window.localStorage.setItem(pid,number);
            // console.log(window.localStorage[pid]);
    }
        
    var clearLocal = function(a){
        var pid = a;
        window.localStorage.removeItem(pid);
    }

    var loadLocal = function(){
            var storage = window.localStorage;
            var k = 0;
                if(storage.length>0){
                    $('#shoppingList ul li:not(:first)').remove();
                    $('#shoppingList ul').append();
                    for(var index in storage){
                        if(isNaN(index)){
                            continue;
                        }else{
                            if(index!=null){
                                k+=1;
                                var pid=index;
                                // console.log(pid);
                                var number=storage.getItem(pid);
                                var listResponseDic=$.ajax({ 
                                    type:'POST',
                                    url:'admin-process.php?action=prod_fetchOne',
                                    data:'pid='+pid,
                                    async: false
                                }).responseText;
                                //console.log(listResponseDic);
                                var listResponse = JSON.parse(listResponseDic.substring(9)); 
                                //console.log(listResponse);
                                var name = listResponse["success"][0]['name']; 
                                var price = listResponse["success"][0]['price']; 
                                var oneRow = $('<li value="'+pid+'"><span>'+name+'</span><span class="cost">'+price+'</span><span class="unit">HK$</span><div class="count"><div class="subtract">-</div><div class="mid">'+number+'</div><div class="plus">+</div></div></li>');
                                $('#shoppingList ul').append(oneRow);
                            }
                        }
                    }
                    if(k!=0){
                        $('.def').hide();
                        $('#btncheckout').show();
                        $('#alipaybtn').show();
                        $('#header').show();
                        $('#totally').show();
                        $('hr').show();
                        Sum();
                    }
                } 
            }
        // addLocal("aab");
        loadLocal();
       

})
</script>
<script type="text/javascript">

function mycart(){
    var my_cart_info = {};
    var storage = window.localStorage;
    if(storage.length>0){
        for(var index in storage){
            if(isNaN(index)){
                continue;
            }else{
                if(index!=null){
                    var pid = index;
                    var number = storage[index];
                    my_cart_info[pid]=number;
                }}}}
    return my_cart_info
}

function askPrice(pid){
    var listResponseDic=$.ajax({ 
        type:'POST',
        url:'admin-process.php?action=prod_fetchOne',
        data:'pid='+pid,
        async: false
        }).responseText;
        //console.log(listResponseDic);
        var listResponse = JSON.parse(listResponseDic.substring(9)); 
        //console.log(listResponse);
        var price = listResponse["success"][0]['price'];
        return price;     
}
function mysubmit(form){
    var my_cart_info=mycart();
    console.log(my_cart_info);
    var xhr=$.ajax({ 
        type:'POST',
        dataType:"text",
        url:'genDigest.php',
        data:'cart='+JSON.stringify(my_cart_info),
        async: false
    }).responseText;
    var json = JSON.parse(xhr);
    console.log(json);
    form.custom.value = json['digest'];
    form.invoice.value = json['invoice'];
    for(var k in my_cart_info){
        var itemName ='<input type="hidden" name="item_name_'+k+'" value="'+k+'" />'
        var itemQuantity ='<input type="hidden" name="quantity_'+k+'" value="'+my_cart_info[k]+'" />'
        var price = askPrice(k);
        var itemAmount ='<input type="hidden" name="amount_'+k+'" value="'+price+'" />'
        $('#shoppingList form #btncheckout').before(itemName);
        $('#shoppingList form #btncheckout').before(itemQuantity);                
        $('#shoppingList form #btncheckout').before(itemAmount);
    }
    return true;
}
</script>
<script type="text/javascript">
function mysubmitAli(){
    var my_cart_info=mycart();
    console.log(my_cart_info);
    var xhr=$.ajax({ 
        type:'POST',
        dataType:"text",
        url:'alipay/genDigest.php',
        data:'cart='+JSON.stringify(my_cart_info),
        async: false
    }).responseText;
    var json = JSON.parse(xhr);
    console.log(json);
    var totalPrice = json["totalPrice"].toFixed(2);
    var WIDTQout_trade_no ='<input type="hidden" id="WIDout_trade_no" name="WIDout_trade_no" value="'+json["tid"]+'"/>'
    var WIDsubject =' <input type="hidden" id="WIDsubject" name="WIDsubject" value="'+json["name"]+'" />'
    var WIDtotal_amount ='<input type="hidden" id="WIDtotal_amount" name="WIDtotal_amount" value="'+totalPrice+'"/>'
    var WIDbody='<input type="hidden" id="WIDbody" name="WIDbody"  />'
    $('#alipayment').append(WIDTQout_trade_no);
    $('#alipayment').append(WIDsubject);
    $('#alipayment').append(WIDtotal_amount);
    $('#alipayment').append(WIDbody);
    return true;
}
</script>