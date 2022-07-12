<?php 

if (!isset($_GET['action'])) {
	$datajual = mysqli_query($koneksidb, "select t.*, m.nm_member from trn_jualhead t inner join daftarmember m
			on t.idmember=m.idmember order by nojual desc ")or die("gagal akses ".mysqli_error($koneksidb));
}
else if (isset($_GET['action']) && $_GET['action'] == "detail") {
	$data_member = mysqli_query($koneksidb,"select * from daftarmember");
	$data_produk = mysqli_query($koneksidb,"select * from mst_produk ");

	$no = $_GET['nojual'];
	$qjual = mysqli_query($koneksidb, "select jh.*, jd.* from trn_jualhead jh inner join trn_jualdetail jd
	on jh.nojual=jd.nojual where jh.nojual='$no' order by jh.nojual desc");
	$dto = mysqli_fetch_array($qjual);
	
	
}

?>