<?php 
include_once('historyBack.php');
$r = history_fetch();
//var_dump($r);
$record="";
foreach($r as $value){
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
    <title>History</title>
    <link rel="stylesheet" type="text/css" href="../css/top.css">
    <style type="text/css">
        body,table,tr,td,th,h3{padding: 0;margin:0;}
        table{width: 80%; height: auto; margin:0 auto; border: 1px solid #ccc; overflow: hidden;}
        tr{ width: 100%; height: 20px; border:0;}
        th,td{ width: 20%; height: 22px; line-height: 30px; border-top: 1px solid #ccc; overflow: hidden;}
        td{height: 50px;line-height: 50px; }
        th{background: #ccc;}
        h3{width:170px;margin:160px auto 10px; }
        td{text-align: center;}
        .oid{width: 10%;}
        .email{width: 20%;}
        .salt{width: 20%;}
        .digest{width: 30%;}
        .tid{width: 20%;}
        #link{margin-left: 83%;}
        #logout{margin-top: 10px;}
    </style>
</head>
<body>
<div class="back">
    <div class="top">
        <div class="logo"><a href="../index.php"><img src="../img/lol-logo-w-s.png"/></a></div>
        <div class="search">
            <a href="#" class="asearch"><img class="isearch-l" src="../img/searchleft.png"/></a> 
            <input type="text" value="Search for..." name="search" class="input">
            <a href="#" class="asearch"><img class="isearch-r" src="../img/searchright.png"/></a>    
        </div>
        <div class="account">
            <a href="../login.php"><img src="../img/account.png"/></a>
            <div id="info">Please Login</div>   
        </div>
        <div class="cart">
            <a href="#"><img src="../img/cart.png"/></a>
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
            <a href="#"><img src='../img/mylist.png'/></a>
        </div>        
    </div>
</div>
<h3>My History</h3>
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
</body>
</html>

<script src="../jquery-3.3.1.min.js"></script>
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
        url:"../session-auth.php?flag='a'",
        type:"GET",
        dataType:"text",
        async: false
    }).responseText;
    a = a.replace(/\s+/g,"");
    if(a==''){
        //control the click function
        $('#info').click(function(){
        window.location.href = "../login.php";
    })
    }else{
        var b = ""+a+"";
        $('#info').html('<div id="photo"></div>'+a+'<br><span id="change"><a href="../change-auth.php?email='+b+'">[change password]</a>&nbsp&nbsp<a href="../logoutBack.php">[logout]</a></span>');
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
                                    url:'../admin-process.php?action=prod_fetchOne',
                                    data:'pid='+pid,
                                    async: false
                                }).responseText;
                                //console.log(listResponseDic);
                                var listResponse = JSON.parse(listResponseDic.substring(9)); 
                                //console.log(listResponse);
                                var name = listResponse["success"][0]['name']; 
                                var price = listResponse["success"][0]['price']; 
                                var oneRow = $('<li value="'+pid+'"><span>'+name+'</span><span class="price">'+price+'</span><span class="unit">HK$</span><div class="count"><div class="subtract">-</div><div class="mid">'+number+'</div><div class="plus">+</div></div></li>');
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