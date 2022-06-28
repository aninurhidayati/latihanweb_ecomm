<?php
include 'produk_Ctrl.php';
if (!isset($_GET['act'])) {
?>
 <div class="container-lg mt-1 ">
<a href="?modul=mod_kategoriproduk&action=add" class="btn btn-primary mb-2 sticky-top">Tambah Data</a>
    <table class="table table-striped table-primary table-bordered border-info">
        <tr>
            <th>Nama Kategori</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>stock</th>
            <th>action</th>
        </tr>
            <?php
            $data = mysqli_query($koneksidb, "SELECT kp.nmkategori, p.nmproduk, p.stock, p.harga FROM kategoriproduk kp INNER JOIN mst_produk p ON 
            kp.idkategori = p.idkategori");
            foreach ($data as $d) :
            ?>
                <tr>
                    <td><?= $d['nmkategori'] ?></td>
                    <td><?= $d['nmproduk'] ?></td>
                    <td><?= $d['harga'] ?></td>
                    <td><?= $d['stock'] ?></td>
                    <td>
                        <a href="?modul=mod_kategoriproduk&action=edit&id=<?= $d["idkategori"]; ?>" class="btn btn-xs btn-primary"><i class="bi bi-pencil-square"></i> Edit</a>
                        <a href="?modul=mod_kategoriproduk&action=delete&id=<?= $d["idkategori"]; ?>" class="btn btn-xs btn-danger"><i class="bi bi-trash"></i> Delete</a>
                    </td>
                </tr>
            <?php
            endforeach;
            ?>
        </table>
</div>
<?php } ?>