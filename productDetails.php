<?php
require __DIR__.'/lib/db.inc.php'; 
function getOneProduct(){
    global $db;
    $db = ierg4210_DB();
    $pid = $_GET["pid"];
    $q = $db->prepare("SELECT * FROM products WHERE pid = $pid;");
    if ($q->execute())
        return $q->fetchAll();

}
$pid = $_GET["pid"];
$res = getOneProduct();
$name=$res[0]['name'];
$price=$res[0]['price'];
$description=$res[0]['description'];
$imagesPath='<dt><img src="images/'.$pid.'.jpg"></dt>';
if($pid==''){
    header('Location:index.php',true,302);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $name ?></title>
	<link rel="stylesheet" type="text/css" href="css/Heimerdinger.css">
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
                <ul>
                    <li id="header">-------My Shopping List-------</li>
                </ul>
                <hr>
                <div id="totally"><span>TOTALLY:</span><span id="duoShou"></span></div>
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
    <a href="Ltd.php">Ltd Edition</a>
    <span>></span>
    <a href="#"><?php echo $name ?></a>
</nav>

<div class="mid">
    <ul class="categories">
        <li id="hd">categories</li>
        <a href="#"><li class="tag">LPL SOUVENIR</li></a>
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
        <a href="#"><li>all</li></a>
    </ul>
    <!-- change this part ↓ -->
    <div class="middle">
        <dl class="product">
        	<div>
                <?php echo $imagesPath ?>
        	</div>
            <dd id="name"><?php echo $name ?></dd>
        	<dd id="price">HK$<?php echo $price ?></dd>
        	<dd id="desp">
        		<span>Description:</span>
    			<p><?php echo $description ?></p>
    		</dd>
    		<dd id="quantily">
    			<span>Quantily:</span> 
    			<input type="text" name="quantily" value="1">
    			<?php echo '<button class="btn" value="'.$pid.'">ADD TO BAG</button>'?>
    		</dd>
        </dl>
        <!--  <div class="detail">
        <img src="img/hmdg700-1.jpg">
        <img src="img/hmdg700-2.jpg">
        <img src="img/hmdg700-3.jpg">
        <img src="img/hmdg700-4.jpg">
    </div> -->
    </div>

    <ul class="recommended">
    	<li class="rtitle"><span>YOU</span>&nbsp may like...</li>
    	<a href="">
    		<li>
    			<img src="img/150/weijia150.png">
    			<p>Veigar Garage Kit</p>
    			<p>HK$ 200.00</p>
    		</li>
    	</a>
    	<a href="">
    		<li>
    			<img src="img/150/qianjue150.png">
    			<p>Kindred Garage Kit</p>
    			<p>HK$ 200.00</p>
    		</li>
    	</a>
    	<a href="">
    		<li>
    			<img src="img/150/bulong150.png">
    			<p>Braum Garage Kit</p>
    			<p>HK$ 200.00</p>
    		</li>
    	</a>
    	<a href="">
    		<li>
    			<img src="img/150/yasuo150.png">
    			<p>Yasuo Garage Kit</p>
    			<p>HK$ 200.00</p>
    		</li>
    	</a>
        <a href="">
            <li>
                <img src="img/150/bpgc.jpg">
                <p>Yasuo Garage Kit</p>
                <p>HK$ 200.00</p>
            </li>
        </a>
        <a href="">
            <li>
                <img src="img/150/yasuo150.png">
                <p>Yasuo Garage Kit</p>
                <p>HK$ 200.00</p>
            </li>
        </a>
       <!--  <a href="">
            <li>
                <img src="img/150/bsqs.jpg">
                <p>Yasuo Garage Kit</p>
                <p>HK$ 200.00</p>
            </li>
        </a>
        <a href="">
            <li>
                <img src="img/150/dfmj.jpg">
                <p>Yasuo Garage Kit</p>
                <p>HK$ 200.00</p>
            </li>
        </a>
        <a href="">
            <li>
                <img src="img/150/ghnl.jpg">
                <p>Yasuo Garage Kit</p>
                <p>HK$ 200.00</p>
            </li>
        </a>
        <a href="">
            <li>
                <img src="img/150/hyzz.jpg">
                <p>Yasuo Garage Kit</p>
                <p>HK$ 200.00</p>
            </li>
        </a>
        <a href="">
            <li>
                <img src="img/150/jt.jpg">
                <p>Yasuo Garage Kit</p>
                <p>HK$ 200.00</p>
            </li>
        </a>
        <a href="">
            <li>
                <img src="img/150/mzzw.jpg">
                <p>Yasuo Garage Kit</p>
                <p>HK$ 200.00</p>
            </li>
        </a>
        <a href="">
            <li>
                <img src="img/150/nksszs.jpg">
                <p>Yasuo Garage Kit</p>
                <p>HK$ 200.00</p>
            </li>
        </a>
        <a href="">
            <li>
                <img src="img/150/ryxxg.jpg">
                <p>Yasuo Garage Kit</p>
                <p>HK$ 200.00</p>
            </li>
        </a> -->
        </ul>
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
                    var listResponseDic=$.ajax({ 
                        type:'POST',
                        url:'admin-process.php?action=prod_fetchOne',
                        data:'pid='+pid,
                        async: false
                        }).responseText;
                    console.log(listResponseDic);
                    var listResponse = JSON.parse(listResponseDic.substring(9)); 
                    var name = listResponse["success"][0]['name']; 
                    var price = listResponse["success"][0]['price']; 
                    var oneRow = $('<li value="'+pid+'"><span>'+name+'</span><span class="price">'+price+'</span><span class="unit">HK$</span><div class="count"><div class="subtract">-</div><div class="mid">1</div><div class="plus">+</div></div></li>'); 
                    var numLi = $('#shoppingList ul').children('li'); 
                    $('.def').hide();
                    var flag = 1; 
                    for(var i = 0; i<numLi.length;i++){
                        var inner = $(numLi[i]).html();
                        if($(inner).html()==name){
                            flag=0;
                            break;
                        }
                    }
                    if(flag==1){ 
                        $('#header').show();
                        $('#totally').show();
                        $('hr').show();
                        $('#shoppingList ul').append(oneRow);
                        Sum();
                        addLocal(pid);
                    }
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
                if(storage.length>0){
                    for(var i = 0; i<storage.length ; i++){
                        var pid=storage.key(i);
                        // console.log(pid);
                        var number=storage.getItem(pid);
                        var listResponseDic=$.ajax({ 
                            type:'POST',
                            url:'admin-process.php?action=prod_fetchOne',
                            data:'pid='+pid,
                            async: false
                        }).responseText;
                        var listResponse = JSON.parse(listResponseDic.substring(9)); 
                        var name = listResponse["success"][0]['name']; 
                        var price = listResponse["success"][0]['price']; 
                        var oneRow = $('<li value="'+pid+'"><span>'+name+'</span><span class="price">'+price+'</span><span class="unit">HK$</span><div class="count"><div class="subtract">-</div><div class="mid">'+number+'</div><div class="plus">+</div></div></li>');
                        $('#shoppingList ul').append(oneRow);                   
                    }
                    $('.def').hide();
                    $('#header').show();
                    $('#totally').show();
                    $('hr').show();
                    Sum();
                } 
        }
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