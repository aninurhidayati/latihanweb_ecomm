<?php 
    require_once "config/config.php";
    require_once "config/koneksidb.php";
?>
<?php 
        // security_login();
    
    if(!isset($_GET['page'])){
        $data_menu = mysqli_query($koneksidb,"select * from mst_menu ");
        //untuk contoh generate kode
    }
    else if(isset($_GET['action']) && $_GET['action'] == "add"){
        $nmmenu = "";
        $proses = "insert";
        $idmenu = 0 ;
    }
    else if(isset($_GET['action']) && $_GET['action'] == "edit"){
        $qry = mysqli_query($koneksidb,"select * from mst_menu where idmenu=".$_GET['id']." LIMIT 0,1");
        $dt = mysqli_fetch_array($qry);
        $idmenu = $dt['idmenu'];
        $nmmenu = $dt['nmmenu'];
        $proses = "update";
    }
    else if(isset($_GET['action']) && $_GET['action'] == "save"){
        $kodemember = $_POST['kdmember'];
        $nmmember = $_POST['txtnama'];
        $email=$_POST['txtemail'];
        $pass=$_POST['txtpass'];
        $tgllhr=$_POST['tgllhr'];
        // $tgldaftar=$_POST['tgldaftar'];
        $notelp=$_POST['notelp'];
        $alamat=$_POST['alamat'];
        $jk=$_POST['jk'];
        $tgldaftar=date("Y/m/d H:i:s");
        // upload 
        $file = $_FILES['foto']; 
		$target_dir = "assets/img/";
		$target_file =  $target_dir.basename($file['name']);
		$type_file =strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));
		echo $type_file."<br/>";
		$is_upload = 1;
		/* cek batas limit file maks.3MB*/
		if($file['size'] > 5000000){
			$is_upload = 0;
			pesan("File lebih dari 5MB!!");		
		}
		/**cek tipe file */
		if($type_file != "jpg" ){
			$is_upload = 0;
			pesan("hanya tipe file jpg yang diperbolehkan!!");	
		}
		$namafile = "";
		/**proses upload */
		if($is_upload == 1){
			if(move_uploaded_file($file['tmp_name'], $target_file)){
				$namafile = $file['name'];
                mysqli_query($koneksidb,"INSERT into daftarmember (kode_member,nm_member,email,password,tgl_daftar,tgl_lhr,no_telp,alamat,jk,foto) VALUES ('$kodemember','$nmmember','$email','$pass','$tgldaftar','$tgllhr','$notelp','$alamat','$jk','$namafile')") or die (mysqli_error($koneksidb));
                header("Location: index.php?page=daftarmember");
            }
			else if($is_upload == 0){
				pesan("GAGAL upload file gambar!!");
			}
        }

        // else if($proses == "update"){
        //     mysqli_query($koneksidb,"update mst_menu set nmmenu='$nmmenu' where idmenu = $idmenu ")or die(mysqli_error($koneksidb));
        //     echo '<meta http-equiv="refresh" content="0; url='.ADMIN_URL.'?modul=mod_menu">';
        // }
        
    }
    function pesan($alert){	
        echo '<script language="javascript">';
        echo 'alert("'.$alert.'")';  //not showing an alert box.
        echo '</script>';
        //echo '<meta http-equiv="refresh" content="0; url=http://localhost/latihan_webphp/admin/home.php?modul=mod_upload">';	
    }
    ?>