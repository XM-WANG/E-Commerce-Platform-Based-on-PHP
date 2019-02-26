
<style type="text/css">
	
	td{ width: 200px; border: 1px solid #000; height: 20px; text-align: center;}
	#title{background: #ccc;}
	#sheet{ border: 2px solid #000 }
	.file{ width: 100px; }
	
</style>


<?php
require __DIR__.'/lib/db.inc.php';

$cat = ierg4210_cat_fetchall();
$record = '';
$options = '';
foreach ($cat as $value){
    $options .= '<option value="'.$value["catid"].'"> '.$value["name"].' </option>';
}

$res = ierg4210_prod_fetchAll();
foreach ($res as $value){
	$record .= 
		'
		 <tr id="a'.$value["pid"].'">
		 	<td > 
		 		<div align="center">
		        	<input type="hidden" readonly="readonly" name="Npid" value="'.$value["pid"].'"/>
		        	<span>'.$value["pid"].'</span>
		        </div>
		    </td>
		 	<td > 
		 		<div align="center">
		        	<input type="text" readonly="readonly" name="catid" value="'.$value["catid"].'"/>
		        </div>
		    </td>
		 	<td > 
		 		<div align="center">
		        	<input type="text" readonly="readonly" name="name" value="'.$value["name"].'" pattern="^[\w\-]+$"/>
		        </div>
		    </td>
		 	<td > 
		 		<div align="center">
		        	<input type="text" readonly="readonly" name="price" value="'.$value["price"].'" pattern="^\d+\.?\d*$"/>
		        </div>
		    </td>
		 	<td > 
		 		<div align="center">
		        	<input type="text" readonly="readonly" name="description" value="'.$value["description"].'"/>
		        </div>
		    </td>
		 	<td> 
		 		<button id="Dbtn" name="pid" value="'.$value["pid"].'" onclick="del()">Delete</button>
				<button id="Ebtn'.$value["pid"].'" class="Ebtn" name="pid" value="'.$value["pid"].'" onclick="return false">Edit</button>
		 	</td>
		</tr>
		';
		   	
}

?>

<center>
	<form method="POST" action="" enctype="multipart/form-data" name="pl">
		
		<table id = "sheet">
			<tr id="title">
		    	<td >pid</td>
		        <td >catid</td>
		        <td >name</td>
		        <td >price</td>
		        <td >description</td>
		        <td >action</td>
		    </tr>
			<?php echo $record; ?>
		</table>
	</form>
	<button id="add">Add</button>
</center>
<script>
		function del(){
			//alert("1");
			document.pl.action="admin-process.php?action=prod_delete_by_pid";
		}
		function edt(){
			//alert("2");
			document.pl.action="admin-process.php?action=prod_edit";
		}
		function sub(){
			document.pl.action="admin-process.php?action=prod_insert";
		}
</script>
<script type="text/javascript" src="jquery-3.3.1.min.js"></script>
<script type="text/javascript">
	$(function(){
		var row = $('<tr><td><input type="hidden" name="pid" ></td><td><select name = "catid"><?php echo $options; ?></select></td><td><input id="prod_name" type="text" name="name" required="required" pattern="^[\\w\\-]+$"/></td><td><input id="prod_price" type="text" name="price" required="required" pattern="^\\d+\\.?\\d*$"/></td><td><input id="prod_desc" type="text" name="description"/></td><td><input type="file" class="file" name="file" required="true" accept="image/jpeg"/><button onclick="sub()">submit</button></td></tr>');
		$('#add').click(function(){	
			$('#sheet').append(row);
		})
		
		$('.Ebtn').click(function(){
			var id = $(this).val();
			var btn = $('<input type="file" class="file" name="file" required="true" accept="image/jpeg"/><button name="pid" value="'+id+'" onclick="edt()">submit</button>');
			var sel = $('<select name = "catid"><?php echo $options; ?></select>')
			$('#a'+id+' input').removeAttr("readonly");
			$('#a'+id+' td:last button').remove();
			$('#a'+id+' td:eq(1) input').remove();
			$('#a'+id+' td:eq(1)').append(sel);
			$('#a'+id+'~tr input').removeAttr("name");
			$('#a'+id+' td:last').append(btn);
		})

	})
</script>
