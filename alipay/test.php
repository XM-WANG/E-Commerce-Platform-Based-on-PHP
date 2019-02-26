<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
    <form name="alipayment" action="pagepay/pagepay.php" method="POST" onsubmit="return mysubmit(this)">
	<input id="btncheckout" type="submit" value="Checkout">
    </form>
    <button id = "btn">test</button>
</body>
</html>
<script src="../jquery-3.3.1.min.js"></script>
<script type="text/javascript">
//function set
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
    var totalPrice = json["totalPrice"].toFixed(2);
    var WIDTQout_trade_no ='<input  id="WIDout_trade_no" name="WIDout_trade_no" value="'+json["tid"]+'"/>'
    var WIDsubject =' <input  id="WIDsubject" name="WIDsubject" value="1155121439 products" />'
    var WIDtotal_amount ='<input  id="WIDtotal_amount" name="WIDtotal_amount" value="'+totalPrice+'"/>'
    var WIDbody='<input id="WIDbody" name="WIDbody"  />'
    $('form').append(WIDTQout_trade_no);
    $('form').append(WIDsubject);
    $('form').append(WIDtotal_amount);
     $('form').append(WIDbody);
    return true;
}
</script>
<!-- <script type="text/javascript">
    $('#btn').click(function(){
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
    })
</script> -->
