<?php 
//contoh : http://localhost/latihanweb_ecomm/admin/home.php
/**menampilkan server atau domain  */
$set_server = "http://".$_SERVER['HTTP_HOST']; //output: localhost
/**menampilkan url selain nama server atau domain */
$url_folders = $_SERVER['PHP_SELF']; //output: /latihanweb_ecomm/admin/home.php
/* merubah menjadi array dengan fungsi explode dipisahkan dengan simbol /  */
$url_folders_arr = explode('/', $url_folders); //output: array("", latihanweb_ecomm, admin, home.php)
$url_mainfolder = $url_folders_arr[1]; //output: latihanweb_ecomm

define("MAIN_URL", $set_server."/".$url_mainfolder); //output: http://localhost/latihanweb_ecomm
define("ADMIN_URL", $set_server."/".$url_folders); 
?>