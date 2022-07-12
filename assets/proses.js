if (document.getElementById("subkategori")) {
  let kategori = [
    { nmkategori: "Kaos", link: "#" },
    { nmkategori: "Celana", link: "#" },
    { nmkategori: "Kemeja", link: "#" },
    { nmkategori: "Dress", link: "#" },
    { nmkategori: "Sepatu", link: "#" },
  ];
  let listkategori = document.getElementById("subkategori");
  let list = "<ul>";
  kategori.forEach((item) => {
    list += "<li><a href='#'>" + item.nmkategori + "</a></li>";
    //menyisipkan hasil variabel ke html
  });
  list += "</ul>";
  listkategori.innerHTML = list;
}
function ceklogin() {
  const tbuser = "ani@gmail.com";
  const tbpass = "12345";
  //varibel untuk menampung data dari form login
  let userlogin = document.getElementById("logusername").value;
  let passlogin = document.getElementById("logpassword").value;
  if (userlogin === "" || userlogin === null) {
    //alert("Username wajib diisi!!");
    alert("Username wajib diisi!!");
  } else if (passlogin === "" || passlogin === null) {
    //alert("Password wajib diisi!!");
    alert("Password wajib diisi!!");
  } else {
    if (userlogin === tbuser && passlogin === passlogin) {
      //   alert("Login Berhasil");
      alert("Login Berhasil, Selamat Datang " + userlogin + "");
      window.location.href = "index.html";
    } else {
      alert("Username dan Password tidak sesuai!!");
    }
  }
}

if (document.getElementById("formdaftar")) {
  let nama = document.getElementById("txtname");
  let username = document.getElementById("txtuser");
  let password = document.getElementById("txtpass");
  let cpassword = document.getElementById("txtcpass");
  let telepon = document.getElementById("txttelp");
  let button = document.getElementById("btndaftar");
  nama.onkeyup = function () {
    nama.value = nama.value.toUpperCase();
  };
  cpassword.onkeyup = function () {
    if (password.value == cpassword.value) {
      button.disabled = false;
      document.getElementById("alert").style.display = "none";
    } else {
      document.getElementById("alert").style.display = "inline";
      button.disabled = true;
    }
  };
  button.onclick = function () {
    if (nama.value == null || nama.value == "") {
      alert("Nama Harus diisi!!");
    } else if (username.value == null || username.value == "") {
      alert("Username Harus diisi!!");
    } else if (password.value == null || password.value == "") {
      alert("Password Harus diisi!!");
    } else if (telepon.value == null || telepon.value == "") {
      alert("Nomor Telepon Harus diisi!!");
    } else {
      let today = new Date();
      let kodenama = nama.value.substring(0, 2);
      document.getElementById("formdaftar").style.display = "none";
      document.getElementById("tampildaftar").style.display = "inline";
      document.getElementById("outnama").innerHTML = " : " + nama.value;
      document.getElementById("outuser").innerHTML = " : " + username.value;
      document.getElementById("outtelepon").innerHTML = " : " + telepon.value;
      document.getElementById("outkode").innerHTML = " : " + today.getMonth() + today.getFullYear() + kodenama;
    }
  };
}

if (document.getElementById("formcontoh")) {
  $("#exproduk").change(function () {
    let idproduk = $(this).val(); //idproduk
    //ini hanya digunakan untuk attribut data pada combobox
    let hrgproduk = $(this).find(":selected").data("hargaaaa");
    console.log(idproduk + ":" + hrgproduk);
    $("#exharga").val(hrgproduk);
  });
  //hitung total
  $("#exqty").change(function () {
    let qty = $(this).val();
    let harga = $("#exharga").val();
    let total = harga * qty;
    $("#extotal").val(total);
    console.log(qty + ":" + harga);
  });
}

//ketika combo member dipilih
$("#ex_member").change(function (e) {
  e.preventDefault();
  let idmember = $(this).val();
  console.log(idmember);
  $.ajax({
    url: "http://localhost/latihanweb_ecomm/admin/mod_contoh/proses.php",
    data: { member: idmember },
    type: "POST",
    cache: false,
    success: function (responseData) {
      let data = JSON.parse(responseData);
      console.log(data.no_invoice);
    },
  });
});

//proses halaman ordeer
if (document.getElementById("formorder")) {
  $("#idbarang").change(function () {
    let idproduk = $(this).val();
    let namabarang = $(this).find(":selected").data("namabrg");
    let hargabarang = $(this).find(":selected").data("hargabrg");
    $("#nm_barang").val(namabarang);
    $("#harga").val(hargabarang);
  });
  $("#btn_addbarang").click(function () {
    let idbarang = $("#idbarang").val();
    let nmbarang = $("#nm_barang").val();
    let harga = $("#harga").val();
    let qty = $("#jml").val();
    let subtotal = 0;
    let total = $("#total").val();
    console.log(total);
    if (idbarang == "") {
      alert("Barang belum dipilih!!");
    } else if (qty == "" || qty == 0) {
      alert("Jumlah belum diinput!!");
    } else {
      subtotal = Number(harga) * Number(qty);
      let listrows = "<tr>";
      listrows += "<td>" + nmbarang + " <input type='hidden' name='row_idbarang[]' value='" + idbarang + "'></td>";
      listrows += "<td>" + harga + "<input type='hidden' name='row_harga[]' value='" + harga + "'></td>";
      listrows += "<td>" + qty + "<input type='hidden' name='row_qty[]' value='" + qty + "'></td>";
      listrows += "<td>" + subtotal + "<input type='hidden' name='row_subtotal[]' value='" + subtotal + "'></td>";
      listrows += "</tr>";
      $("#listbarang").append(listrows);
      total = Number(total) + Number(subtotal);

      $("#total").val(total);
      $("#viewtotalbayar").text(total);
    }
  });
  $("#btn_order").click(function () {
    //buat validasi form inputan yang wajib diisi
    $("#konfirmasiorder").modal("show");
  });
  $("#btn_saveorder").click(function () {
    $("#formorder").attr("action", "?page=order&action=ordersave");
    $("#formorder").submit();
    //$(location).attr("href", "?page=order");
  });
}
