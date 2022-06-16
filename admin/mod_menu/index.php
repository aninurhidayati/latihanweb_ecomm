<?php 
include_once("menuCtrl.php");
if(!isset($_GET['action'])){
 ?>
<a href="?modul=mod_menu&action=add" class="btn btn-primary btn-xs mb-1">Tambah Data</a>
<table class="table table-bordered">
	<tr>
		<th width="70%">nama menu</th>
		<th>Action</th>
	</tr>
	<?php 
		while($d= mysqli_fetch_array($data)){
			echo '
			<tr>
				<td>'.$d['nmmenu'].'</td>
				<td><a href="?modul=mod_menu&action=edit&id='.$d['idmenu'].'"> Edit</a></td>
			</tr>
		';
		}
	
	?>

</table>
<?php } 
else if(isset($_GET['action']) && ($_GET['action']== "add" || $_GET['action']== "edit")){
?>
<form action="?modul=mod_menu&action=save" method="POST">
	<input type="hidden" name="idmenu" value="<?= $idmenu; ?>">
	<input type="text" name="proses" value="<?= $proses; ?>">
	<input type="text" name="txtmenu" value="<?= $nmmenu; ?>">
	<button type="submit">ok</button>
</form>
<?php
}
?>