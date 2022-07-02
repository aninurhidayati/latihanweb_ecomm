<?php
security_login();
if (isset($_GET['act']) && ($_GET['act'] == 'add')){
    $judul = "Form Hak Akses";
} else if (isset($_POST['submit'])){
    $txtuser = $_POST['iduser'];
    $txtmenu = $_POST['idmenu'];
    $pilihan = count($txtmenu);
    for($i = 0;$i < $pilihan; $i++){
        $qinsert = mysqli_query($koneksidb, "INSERT INTO hakakses_menu VALUES ('', '$txtmenu[$i]','$txtuser')");
    }
    header("Location: home.php?modul=mod_hakakses&tampil");
    // $tampil = 1;
}
?>