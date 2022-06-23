<?php
include_once("transaksiCtrl.php");
if (!isset($_GET['action'])) {
?>
    <a href="?modul=mod_transaksi&action=add" class="btn btn-primary btn-xs mb-1">Tambah Data</a>
    <table class="table table-bordered">
        <tr>
            <th>Kode Invoice</th>
            <th>Nama Produk</th>
            <th>Nama Member</th>
            <th>Total</th>
            <th>Status Bayar</th>
            <th>Action</th>
        </tr>
    </table>
    <hr>
<?php } else if (isset($_GET['action']) && ($_GET['action'] == "add" || $_GET['action'] == "edit")) {
?>
    <?php
    $query_member = mysqli_query($koneksidb, "SELECT idmember,kode_member,nm_member FROM daftarmember");
    $query_cekkode = mysqli_query(
        $koneksidb,
        "select no_invoice from tst_penjualan ORDER BY no_invoice DESC LIMIT 0,1"
    );
    $cekkode = mysqli_fetch_array($query_cekkode);
    $kodeakhir = $cekkode['no_invoice'];
    // echo $kodeakhir . "<br>";
    $no_urutakhir = substr($kodeakhir, 8);
    // echo $no_urutakhir . "<br>";
    $th_akhir = substr($kodeakhir, 4, 4);
    $th_sekarang = date("Y");
    // echo $th_akhir . " : " . $th_sekarang . "<br>";
    if ($th_akhir == $th_sekarang) {
        //$nourut_baru = $no_urutakhir + 1;

        if ($no_urutakhir < 10) {
            $nourut_baru = "00" . ($no_urutakhir + 1);
        } else if ($no_urutakhir < 100) {
            $nourut_baru = "0" . ($no_urutakhir + 1);
        } else {
            $nourut_baru = ($no_urutakhir + 1);
        }
        // echo "kodenya:" . $nourut_baru . "<br>";
    } else {
        $nourut_baru =  "0001";
    }
    $kodeterbaru = "INV-" . $th_sekarang . $nourut_baru;
    // echo "kode: " . $kodeterbaru;
    $data_produk = mysqli_query($koneksidb, "select * from mst_produk");
    ?>
    <form action="?modul=mod_transaksi&action=save" id="formtransaksi" method="POST">
        <div class="row">
            <label class="col-md-2">Kode</label>
            <div class="col-md-5">
                <input type="hidden" name="proses" value="<?= $proses; ?>">
                <input type="text" name="kode" id="kode" class="form-control" value="<?= $kodeterbaru; ?>" readonly>
            </div>
        </div>
        <div class="row pt-3">
            <label class="col-md-2">Member</label>
            <div class="col-md-5">
                <select name="member" id="member" class="form-control">
                    <?php
                    foreach ($query_member as $m) :
                    ?>
                        <option value="<?= $m['idmember']; ?>"><?= $m['nm_member']; ?></option>
                    <?php
                    endforeach;
                    ?>
                </select>
            </div>
        </div>
        <div class="row pt-3">
            <label class="col-md-2">Produk</label>
            <div class="col-md-5">
                <select name="produk" id="produk" class="form-control">
                    <option value="" selected disabled>-Pilih Produk--</option>
                    <?php
                    while ($p = mysqli_fetch_array($data_produk)) {
                        echo '<option value="' . $p['idproduk'] . '" 
					data-harga="' . $p['harga'] . '" data-stock="' . $p['stock'] . '">' . $p['nmproduk'] . '</option>';
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="row pt-3">
            <label class="col-md-2">Stock</label>
            <div class="col-md-5">
                <input type="text" name="stock" id="stock" class="form-control" readonly>
            </div>
        </div>
        <div class="row pt-3">
            <label class="col-md-2">Harga </label>
            <div class="col-md-5">
                <input type="text" name="harga" id="harga" class="form-control" readonly>
            </div>
        </div>
        <div class="row pt-3">
            <label class="col-md-2">Qty </label>
            <div class="col-md-5">
                <input type="text" name="qty" id="qty" class="form-control">
            </div>
        </div>
        <div class="row pt-3">
            <label class="col-md-2">Total </label>
            <div class="col-md-5">
                <input type="text" name="total" id="total" class="form-control" readonly>
            </div>
        </div>
        <div class="row pt-3">
            <label class="col-md-2"></label>
            <div class="col-md-5">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
<?php
}
?>