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
    $file = $_FILES['img_upload'];
    if ($proses == "insert") {
        $no_invoice = $_POST['kode'];
        $member = $_POST['member'];
        $produk = $_POST['produk'];
        $stock = $_POST['stock'];
        $qty = $_POST['qty'];
        $harga = $_POST['harga'];
        $total = $_POST['total'];
        $is_bayar = $_POST['statusbayar'];
        $is_closed = $_POST['statuspesanan'];
        if (!empty($_FILES['bukti'])) {
            $file = $_FILES['bukti'];
            $target_dir = "../assets/img/";
            $target_file =  $target_dir . basename($file['name']);
            $type_file = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
            echo $type_file . "<br/>";
            $is_upload = 1;
            /* cek batas limit file maks.3MB*/
            if ($file['size'] > 3000000) {
                $is_upload = 0;
                pesan("File lebih dari 3MB!!");
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
                } else {
                    pesan("GAGAL upload file gambar!!");
                }
            }
        } 
        else {
            if ($_GET['action'] == "update") {
                $namafile = $_POST['file_uploaded'];
            } else {
                $namafile = "";
            }
        }
    }
}

