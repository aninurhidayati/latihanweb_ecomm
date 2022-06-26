<?php
include_once("daftarCtrl.php");
include_once("detailmember.php");
?>
        <table class="table table-bordered ">
            <?php
	            while ($d = mysqli_fetch_array($data_member)) {
	        ?>
            <tr>
                <td><?=$d['idmember'];?></td>
                <td><?=$d['kode_member'];?></td>
                <td><a href="?modul=mod_member&profile=detailmember.php&id=<?=$d['idmember'];?>"><?=$d['nm_member'];?></a></td>
                <td><?=$d['email'];?></td>
                <td><?=$d['password'];?></td>
                <td><?=$d['tgl_daftar'];?></td>
                <td><?=$d['tgl_lhr'];?></td>
                <td><?=$d['no_telp'];?></td>
                <td><?=$d['alamat'];?></td>
                <td><?=$d['jk'];?></td>
                <td><img src="../assets/img/<?=$d['foto']; ?>" width="200px"></td>
            </tr>
            <?php }?>    
        </table>
            