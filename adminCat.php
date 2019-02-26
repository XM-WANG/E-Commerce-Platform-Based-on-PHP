<style type="text/css">
	
	td{ width: 200px; border: 1px solid #000; height: 20px; text-align: center;}
	#title{background: #ccc;}
	#sheet{ border: 2px solid #000 }
	.file{ width: 100px; }
	
</style>

<?php
require __DIR__.'/lib/db.inc.php';

$cat = ierg4210_cat_fetchall();
$catList = '';
foreach ($cat as $value){
    $catList .= '
    <tr id="a'.$value["catid"].'">
	    <td > 
			<div align="center">
				<input type="hidden" readonly="readonly" name="Npid" value="'.$value["catid"].'"/>
				<span>'.$value["catid"].'</span>
			</div>
		</td>
		<td > 
			<div align="center">
			    <input type="text" readonly="readonly" name="name" value="'.$value["name"].'" pattern="^[\w\-]+$"/>
			</div>
		</td>
		<td> 
		 	<button id="Dbtn" name="catid" value="'.$value["catid"].'" onclick="del()">Delete</button>
			<button id="Ebtn'.$value["catid"].'" class="Ebtn" name="catid" value="'.$value["catid"].'" onclick="return false">Edit</button>
		</td>
	</tr>
	';
}

?>

<center>
	<form method="POST" action="" enctype="multipart/form-data" name="pl">
		
		<table id = "sheet">
			<tr id="title">
		        <td>catid</td>
		        <td>name</td>
		        <td>action</td>
		    </tr>
			<?php echo $catList; ?>
			<!-- <tr>
	    		<td > 
					<div align="center">
						<input type="hidden" readonly="readonly" name="Npid" value="'.$value["catid"].'"/>
						<span>'.$value["catid"].'</span>
					</div>
				</td>
				<td > 
					<div align="center">
					    <input type="text" name="name" value="'.$value["name"].'" pattern="^[\w\-]+$"/>
					</div>
				</td>
				<td> 
				 	<button onclick="sub()">submit</button>
				</td>
			</tr> -->
		</table>
	</form>
	<button id="add">Add</button>
</center>
<script>
		function del(){
			//alert("1");
			document.pl.action="admin-process.php?action=cat_delete";
		}
		function edt(){
			//alert("2");
			document.pl.action="admin-process.php?action=cat_edit";
		}
		function sub(){
			document.pl.action="admin-process.php?action=cat_insert";
		}
</script>
<script type="text/javascript" src="jquery-3.3.1.min.js"></script>
<script type="text/javascript">
	$(function(){
		var row = $('<tr><td ><div align="center"><input type="hidden" readonly="readonly" name="Npid"/></div></td><td ><div align="center"><input type="text" name="name" pattern="^[\\w\\-]+$"/></div></td><td><button onclick="sub()">submit</button></td></tr>');
		$('#add').click(function(){	
			$('#sheet').append(row);
		})
		
		$('.Ebtn').click(function(){
			var id = $(this).val();
			var btn = $('<button name="catid" value="'+id+'" onclick="edt()">submit</button>');
			$('#a'+id+' input').removeAttr("readonly");
			$('#a'+id+' td:last button').remove();
			$('#a'+id+'~tr input').removeAttr("name");
			$('#a'+id+' td:last').append(btn);
		})

	})
</script>
