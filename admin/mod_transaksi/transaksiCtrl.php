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
    $qry = mysqli_query($koneksidb, "select * from mst_menu where idmenu=" . $_GET['id'] . " LIMIT 0,1");
    $dt = mysqli_fetch_array($qry);
    $idmenu = $dt['idmenu'];
    $nmmenu = $dt['nmmenu'];
    $proses = "update";
} else if (isset($_GET['action']) && $_GET['action'] == "save") {
    $no_invoice = $_POST['kode'];
    $member = $_POST['member'];
    $produk = $_POST['produk'];
    $stock = $_POST['stock'];
    $qty = $_POST['qty'];
    $harga = $_POST['harga'];
    $total = $_POST['total'];
    $tgl = date('Y-m-d H:i:s');
    $proses = $_POST['proses'];
    if ($proses == "insert") {
        mysqli_query($koneksidb, "insert into tst_penjualan (no_invoice,idproduk,idmember,qty,harga,total,tgl_transaksi,is_bayar,is_closed) VALUES ('$no_invoice','$produk','$member','$qty','$harga','$total','$tgl','0','0')") or die(mysqli_error($koneksidb));
        echo '<meta http-equiv="refresh" content="0; url=' . ADMIN_URL . '?modul=mod_transaksi">';
        header("Location: home.php?modul=mod_transaksi");
    } else if ($proses == "update") {
        mysqli_query($koneksidb, "update mst_menu set nmmenu='$nmmenu' where idmenu = $idmenu ") or die(mysqli_error($koneksidb));
        echo '<meta http-equiv="refresh" content="0; url=' . ADMIN_URL . '?modul=mod_menu">';
    }
}
