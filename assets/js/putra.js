$("#btnsimpan").click(function () {
    let nmkategori = $("#nmkategori_ins").val();
    if (nmkategori == "") {
      alert("nama kategori Wajib diisi!!");
    } else {
      $("#ModalKonfirmasi").modal("show");
    }
  });
  $("#btnyes").click(function () {
    $("#kategori_produk").attr("action", "?modul=mod_kategoriproduk&action=save");
    $("#kategori_produk").submit();
  });
//   $("#btnreset").click(function () {
//     alert("hallooo");
//   });