<?php
require __DIR__.'/lib/db.inc.php';
$res = ierg4210_prod_fetchAll();
$record = '';
foreach ($res as $value){
    $record .=
    '
    <li>
        <a href="'.$value['catid'].'/productDetails.php?pid='.$value["pid"].'">
            <div>
                <img src="images/'.$value["pid"].'.jpg">
            </div>
            <p class="name">'.$value["name"].'</p>
        </a>
        <p class="cost">HK$'.$value["price"].'</p>
        <button class="btn" value="'.$value["pid"].'">ADD TO BAG</button>
    </li>
    ';            
}

$cat = ierg4210_cat_fetchall();
$li = '';
foreach ($cat as $value){
    $li .= '<a href="#"><li>'.$value["name"].'</li></a>';
}

?>
<!-- <!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd"> -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Ltd Edition</title>
	<link rel="stylesheet" type="text/css" href="css/Ltd.css">
    <script type="text/javascript" src="js/Ltd.js"></script>
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
            <a href="#"><img id="fake" src="img/cart.png"/></a>
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
            <a href="history/history.php"><img src='img/mylist.png'/></a>
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
        </li>
        <li class="vt">|</li>
        <li id="gk">
            <a href="#">Garage Kits</a>
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
    <a href="index.php">Home</a>
    <span>></span>
    <a href="#">Garage Kit</a>
    <span>></span>
    <a href="#">Ltd Edition</a>
</nav>
<div class="mid">
    <ul class="categories">
         <li id="hd">categories</li>
         <?php echo $li ?>
       <!--  <a href="#"><li class="tag">LPL SOUVENIR</li></a>
        <a href="#"><li>SNG team</li></a>
        <a href="#"><li>OMG team</li></a>
        <a href="#"><li>RNG team</li></a>
        <a href="#"><li>EDG team</li></a>
        <a href="#"><li>RW team</li></a>
        <a href="#"><li class="tag">GARAGE KITS</li></a>
        <a href="#"><li>small-sized</li></a>
        <a href="#"><li>medium-sized</li></a>
        <a href="#"><li>large-sized</li></a>
        <a href="#"><li>Ltd Edition</li></a>
        <a href="#"><li class="tag">PLUSH TOYS</li></a>
        <a href="#"><li>scale model</li></a>
        <a href="#"><li>completed</li></a>
        <a href="#"><li>collection edition</li></a>
        <a href="#"><li class="tag">FASHION DRESS</li></a>
        <a href="#"><li>T-shirt</li></a>
        <a href="#"><li>hoodie</li></a>
        <a href="#"><li>jacket</li></a>
        <a href="#"><li>trousers</li></a>
        <a href="#"><li>hats</li></a>
        <a href="#"><li class="tag">DAILY USE</li></a>
        <a href="#"><li>mug</li></a>
        <a href="#"><li>backpack</li></a>
        <a href="#"><li>notebook</li></a>
        <a href="#"><li>mouse pad</li></a>
        <a href="#"><li>scarf</li></a>
        <a href="#"><li>snap-on case</li></a>
        <a href="#"><li class="tag">OTHERS</li></a>
        <a href="#"><li>poster</li></a>
        <a href="#"><li>all</li></a> -->
    </ul>
    <div class="table">
        <div class="sort">
            <select name="sort" id="sel">
                <option value="#">sort</option>
                <option value="#">2018 edition</option>
                <option value="#">2017 edition</option>
                <option value="#">festival edition </option>
            </select>
        <ul class="prolist">
            <!-- <li>
                <a href="Heimerdinger Garage Kit.html">
                    <img src="img/180/dfmj.jpg">
                    <p class="name">Heimerdinger Garage Kit</p>
                </a>
                <p class="cost">HK$200</p>
                <button class="btn">ADD TO BAG</button>
            </li>
            <li>
                <a href="MissFortune.html" target="_blank">
                    <img src="img/180/eyxj.jpg">
                    <p class="name">MissFortune Garage Kit</p>
                </a>
                <p class="cost">HK$200</p>
                <button class="btn">ADD TO BAG</button>
            </li> -->
            <?php echo $record ?>
        </ul>
    </div>
</div>

</div>
</body>
</html>


<script src="jquery-3.3.1.min.js"></script>
<script type="text/javascript">
    
    $(function(){
        // Control hide and show of the shopping list. 
        // $('.cart').hover(function(){
        //     $('#shoppingList').slideToggle(-500);
        // });
        //There is bug in fucking slideToggle function!!!!! 
        $('.cart').mouseover(function(){
            $('#shoppingList').show();
        }).mouseout(function(){
            $('#shoppingList').hide();
        });
        // add products to shopping list
        $('.btn').click(function(){
                var a=$.ajax({
                    url:"session-auth.php?flag='a'",
                    type:"GET",
                    dataType:"text",
                    async: false
                }).responseText;
                a = a.replace(/\s+/g,"");
                if(a==''){
                    window.location.href = "login.php";
                }else{
                    var pid= $(this).val(); 
                    addLocal(pid);
                    loadLocal();
                }
                                   
        })
        // increase the number
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
            $(".price").each(function(){
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
                    $('#btncheckout').hide();
                    $('#alipaybtn').hide();
                    $('.def').show();
                }
         }

        var addLocal = function(a){
            var pid = a;
            window.localStorage.setItem(pid,"1");
            // console.log(window.localStorage[pid]);

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
                                var oneRow = $('<li value="'+pid+'"><span>'+name+'</span><span class="price">'+price+'</span><span class="unit">HK$</span><div class="count"><div class="plus">+</div><div class="mid">'+number+'</div><div class="subtract">-</div></div></li>');
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
// window.onunload=function(){
//         localStorage.clear();
// }

</script>
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
    }
    

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
function tripleArray(json) {
    var a = new Array();
    for(var k in json){
        var b = {};
        b[k]=json[k]
        a.push(b);
    }
    return a;
}
function mysubmit(form){
    var my_cart_info=mycart();
    var my_cart_info_array = tripleArray(my_cart_info);
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
    for(var i = 0; i < my_cart_info_array.length; i++){
        var itemName ='<input type="hidden" name="item_name_'+(i+1)+'" value="'+Object.keys(my_cart_info_array[i])[0]+'" />'
        var itemQuantity ='<input type="hidden" name="quantity_'+(i+1)+'" value="'+my_cart_info[Object.keys(my_cart_info_array[i])[0]]+'" />'
        var price = askPrice(Object.keys(my_cart_info_array[i])[0]);
        var itemAmount ='<input type="hidden" name="amount_'+(i+1)+'" value="'+price+'" />'
        $('#shoppingList form #btncheckout').before(itemName);
        $('#shoppingList form #btncheckout').before(itemQuantity);                
        $('#shoppingList form #btncheckout').before(itemAmount);
        localStorage.clear();
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
    localStorage.clear();
    return true;
}
</script>
<script type="text/javascript">
    $('#fake').click(function(){
        var xhr=$.ajax({ 
        type:'GET',
        dataType:"text",
        url:'fake.php',
        async: false
    })
})
</script>