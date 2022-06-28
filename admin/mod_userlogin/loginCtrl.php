<?php 
security_login();

if(isset($_GET['action']) && ($_GET['action']== "add")){
	//jika ada send variabel act=add, tampil form input/tambah
	$judul = "Form Input Data";

	//$iduser = 0;
	$username= "";
    $nama="";
    $password="";
    $isactive="";
	$action = "insert";
}
else if(isset($_GET['action']) && ($_GET['action']== "edit")){
	//jika ada send variabel action=add, tampil form input/tambah
	$judul = "Form Edit Data";
	$iduser = $_GET['id_user']; //dapat dari URL
	$listkategori = mysqli_query($koneksi_db,
			"select * from mst_userlogin where is_active = 1 order by id_user DESC")
			or die("gagal akses table mst_menu ".mysqli_error($koneksi_db));
	$qdata = mysqli_query($koneksi_db,"select m.*, k.nm_kategori from mst_blog m 
				inner join mst_kategoriblog k on m.id_kategori=k.id_kategori where id_blog=$idkey")
			or die(mysqli_error($koneksi_db));
	$data = mysqli_fetch_array($qdata);
	$idblog = $data['id_blog'];
	$judulblog= $data['judul'];		
	$idkategori = $data['id_kategori'];
	$isi = $data['isi'];
	$tanggal = $data['date_input'];
	$action = "update";
	$file_uploaded = $data['gambar'];
}
else if(isset($_GET['action']) && ($_GET['action']== "save")){
	//jika ada send variabel act=save, ketika proses simpan(insert)
	
	$iduser = $_POST['iduser'];		
	$username = $_POST['username'];
	$nama = $_POST['name'];
	$password = $_POST['pass'];
	$isactive = $_POST['isactive'];

	//query untuk simpan
	if($_POST['action'] == "insert" ){
		$qinsert = mysqli_query($koneksi_db, 
			"INSERT into mst_userlogin(id_user,username,nama_lengkap,password,is_active) 
			VALUES('$iduser','$username','$nama','$password','$isactive')")
			or die (mysqli_error($koneksi_db));
		if($qinsert){
			//ketik proses simpan berhasil
			header("Location:http://localhost/latihanweb_ecomm/admin/?modul=mod_userlogin");
		}
	}
	else{
		$qupdate = mysqli_query($koneksi_db, 
			"UPDATE mst_userlogin SET ")
			or die (mysqli_error($koneksi_db));
		if($qupdate){
			//ketik proses simpan berhasil
			header("Location: http://localhost/latihanweb_ecomm/admin/?modul=mod_userlogin");
		}
	}
}	

function pesan($alert){	
	echo '<script language="javascript">';
	echo 'alert("'.$alert.'")';  //not showing an alert box.
	echo '</script>';
}
?>
