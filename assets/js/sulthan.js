$("#txtkonfirm").click(function () {
  let user = $("#txtnnama").val();
  let pass_baru = $("#txtnpass").val();
  let ckuser = $("#ckuser");
  if (user == "" || user == null) {
    alert("username wajib diisi");
  } else if (pass_baru == "" || pass_baru == null) {
    alert("password baru wajib diisi");
  } else {
    $("#konfirmasi").modal("show");
  }
});
