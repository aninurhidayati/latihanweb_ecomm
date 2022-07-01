<?php
if (isset($_GET['action']) && ($_GET['action'] == "add")) {
    $judul = "Input your data";
} else if (isset($_GET['action']) && ($_GET['action'] == "edit")) {
    $judul1 = "Form Edit Data";
} else if (isset($_GET['act']) && ($_GET['act'] == "save")) {
    $nmproduk = $_POST['nmproduk_ins'];
    $id_kategori = $_POST['idkategori_ins'];
    $harga = $_POST['harga_ins'];
    $deskripsi = $_POST['deskripsi'];
    $stock = $_POST['stock_ins'];
    $kondisi = $_POST['kondisi_ins'];
    $berat = $_POST['berat_ins'];
    if (!empty($_FILES['img_add'])) {
        $file = $_FILES['img_add'];
        $target_dir = "../assets/img/";
        $target_file =  $target_dir . basename($file['name']);
        $type_file = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $is_upload = 1;
        /* cek batas limit file maks.5MB*/
        if ($file['size'] > 5000000) {
            $is_upload = 0;
            pesan("File lebih dari 5MB!!");
        }
            /**cek tipe file */
            if ($type_file != "jpg" && $type_file != "png") {
                $is_upload = 0;
                pesan("Tipe file bukan file gambar!!");
            }
            $namafile = "";
            /**proses upload */
            if ($is_upload == 1) {
                if (move_uploaded_file($file['tmp_name'], $target_file)) {
                    $namafile = $file['name'];
                    mysqli_query($koneksidb, "INSERT INTO mst_produk (nmproduk,idkategori,harga,deskripsi,stock,kondisi,berat,gambar) VALUES ('$nmproduk',$id_kategori,$harga,'$deskripsi',$stock,'$kondisi','$berat','$img_add')") or die(mysqli_error($koneksidb));
                    header("Location: home.php?modul=mod_produk");
                } else if($is_upload == 0){
                    pesan("GAGAL upload file gambar!!");
                }
            }
        }
    else if($_FILES['bukti']['name'] == ""){
        mysqli_query($koneksidb, "INSERT INTO mst_produk (nmproduk,idkategori,harga,deskripsi,stock,kondisi,berat) VALUES ('$nmproduk',$id_kategori,$harga,'$deskripsi',$stock,'$kondisi','$berat',)") or die(mysqli_error($koneksidb));
        header("Location: home.php?modul=mod_produk");
    }             
}

