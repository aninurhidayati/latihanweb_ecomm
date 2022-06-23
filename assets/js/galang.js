if (document.getElementById("formtransaksi")) {
    $("#produk").change(function () {
      let idproduk = $(this).val(); //idproduk
      //ini hanya digunakan untuk attribut data pada combobox
      let hrgproduk = $(this).find(":selected").data("harga");
      let stock = $(this).find(":selected").data("stock");
    //   console.log(idproduk + ":" + hrgproduk);
      $("#harga").val(hrgproduk);
      $("#stock").val(stock);
    });
    //hitung total
    $("#qty").on('keyup', function () {
      let qty = $(this).val();
      let harga = $("#harga").val();
      let total = harga * qty;
      $("#total").val(total);
    //   console.log(qty + ":" + harga);
    });
  }