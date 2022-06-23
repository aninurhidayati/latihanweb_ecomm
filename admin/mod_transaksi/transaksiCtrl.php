<?php
security_login();

if (!isset($_GET['action'])) {
    // $data_menu = mysqli_query($koneksidb, "select * from mst_menu ");
    //untuk contoh combo
    $data_produk = mysqli_query($koneksidb, "select * from mst_produk");
} else if (isset($_GET['action']) && $_GET['action'] == "add") {
    $nmmenu = "";
    $proses = "insert";
    $idmenu = 0;
} else if (isset($_GET['action']) && $_GET['action'] == "edit") {
    $kode = $_GET['id'];
    $qry = mysqli_query($koneksidb, "select * from tst_penjualan where no_invoice='$kode' LIMIT 0,1");
    $dt = mysqli_fetch_array($qry);
    $id = $dt['no_invoice'];
    $proses = "update";
} else if (isset($_GET['action']) && $_GET['action'] == "save") {
    $proses = $_POST['proses'];
    if ($proses == "insert") {
        $no_invoice = $_POST['kode'];
        $member = $_POST['member'];
        $produk = $_POST['produk'];
        $stock = $_POST['stock'];
        $qty = $_POST['qty'];
        $harga = $_POST['harga'];
        $total = $_POST['total'];
        $tgl = date('Y-m-d H:i:s');
        $pengurangan = ($stock - $qty);
        mysqli_query($koneksidb, "insert into tst_penjualan (no_invoice,idproduk,idmember,qty,harga,total,tgl_transaksi,is_bayar,is_closed) VALUES ('$no_invoice','$produk','$member','$qty','$harga','$total','$tgl','0','0')") or die(mysqli_error($koneksidb));
        mysqli_query($koneksidb, "UPDATE mst_produk SET stock='$pengurangan' WHERE idproduk = '$produk'");
        echo '<meta http-equiv="refresh" content="0; url=' . ADMIN_URL . '?modul=mod_transaksi">';
        header("Location: home.php?modul=mod_transaksi");
    } else if ($proses == "update") {
        if (!empty($_FILES['bukti'])) {
            $file = $_FILES['bukti'];
            $target_dir = "../../assets/img/";
            $target_file =  $target_dir . basename($file['name']);
            $type_file = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
            echo $type_file . "<br/>";
            $is_upload = 1;
            /* cek batas limit file maks.3MB*/
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
                } else {
                    pesan("GAGAL upload file gambar!!");
                }
            }
        } else {
            if ($_GET['action'] == "update") {
                $namafile = $_POST['file_uploaded'];
            } else {
                $namafile = "";
            }
        }
        if (isset($_POST['statusbayar'])) {
            $aktif = 1;
        } else {
            $aktif = 0;
        }
        if (isset($_POST['statuspesanan'])) {
            $aktif1 = 1;
        } else {
            $aktif1 = 0;
        }
        $is_bayar = $aktif;
        $is_closed = $aktif1;
        $id = $_POST['no_invoice'];
        mysqli_query($koneksidb, "UPDATE tst_penjualan SET is_bayar='$is_bayar',is_closed='$is_closed',buktipembayaran='$namafile' WHERE no_invoice = '$id' ") or die(mysqli_error($koneksidb));
        echo '<meta http-equiv="refresh" content="0; url=' . ADMIN_URL . '?modul=mod_transaksi">';
    }
}

function pesan($alert)
{
    echo '<script language="javascript">';
    echo 'alert("' . $alert . '")';  //not showing an alert box.
    echo '</script>';
    //echo '<meta http-equiv="refresh" content="0; url=http://localhost/latihan_webphp/admin/home.php?modul=mod_upload">';	
}
