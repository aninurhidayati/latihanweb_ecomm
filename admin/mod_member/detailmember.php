<?php
include_once("daftarCtrl.php");
if (isset($_GET['profile'])) {
?>
	<?php
	    while ($d = mysqli_fetch_array($data_member)) {
            if(isset($_GET['id']) && ($_GET['id']==$d['idmember'])){
	?>
            <div class="container" >
                <div class="row mb-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 400;">
                    <div class="col-md-4">
                        <img src="../../assets/img/<?=$d['foto'] ?>" class="rounded" width="200px" height="250vh">
                    </div>
                    <div class="col-md-8">
                        <ul class="list-group">
                            <li class="list-group-item"><?=$d['kode_member'];?> (kode member)</li>
                            <li class="list-group-item">Nama : <?=$d['nm_member'];?></li>
                            <li class="list-group-item">Email :<?=$d['email'];?></li>
                            <li class="list-group-item">Password : <?=$d['password'];?></li>
                            <li class="list-group-item">Tanggal daftar : <?=$d['tgl_daftar'];?></li>
                            <li class="list-group-item">Tanggal Lahir : <?=$d['tgl_lhr'];?></li>
                            <li class="list-group-item">No.Telp : <?=$d['no_telp'];?></li>
                            <li class="list-group-item">Alamat : <?=$d['alamat'];?></li>
                            <li class="list-group-item">Jenis Kelamin : <?=$d['jk'];?></li>
                        </ul>
                    </div>
                </div>
                    <div class="row">
                        <div class="col-md-10">
                            <table class="table table-bordered">
                                <tr>
                                    <th>tanggal transaksi</th>
                                    <th>no Invoice</th>
                                    <th>Total</th>
                                    <th>status bayar</th>
                                    <th>status transaksi</th>
                                </tr>
                            </table>
                        </div>
                    </div>
            </div>
	    <?php }?>
    <?php } ?>
<?php } ?>               
 