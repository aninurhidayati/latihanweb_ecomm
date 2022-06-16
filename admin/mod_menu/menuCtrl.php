<?php 
if(!isset($_GET['action'])){
	$data = mysqli_query($koneksidb,"select * from mst_menu ");
}
else if(isset($_GET['action']) && $_GET['action'] == "add"){
	$nmmenu = "";
	$proses = "insert";
	$idmenu = 0 ;
}
else if(isset($_GET['action']) && $_GET['action'] == "edit"){
	$qry = mysqli_query($koneksidb,"select * from mst_menu where idmenu=".$_GET['id']."");
	$dt = mysqli_fetch_array($qry);
	$idmenu = $dt['idmenu'];
	$nmmenu = $dt['nmmenu'];
	$proses = "update";
}
else if(isset($_GET['action']) && $_GET['action'] == "save"){
	$idmenu = $_POST['idmenu'];
	$nmmenu = $_POST['txtmenu'];
	$proses = $_POST['proses'];
	if($proses == "insert"){
		mysqli_query($koneksidb,"insert into mst_menu(nmmenu)values('$nmmenu')")or die(mysqli_error($koneksidb));
		echo '<meta http-equiv="refresh" content="0; url='.ADMIN_URL.'?modul=mod_menu">';
	}
	else if($proses == "update"){
		mysqli_query($koneksidb,"update mst_menu set nmmenu='$nmmenu' where idmenu = $idmenu ")or die(mysqli_error($koneksidb));
		echo '<meta http-equiv="refresh" content="0; url='.ADMIN_URL.'?modul=mod_menu">';
	}
	
}
?>