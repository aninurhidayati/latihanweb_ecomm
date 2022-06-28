<!-- lupa passowrdCtrl -->
<?php
if(isset($_GET['btn']) && ($_GET['btn'] == "btnreq")){
    $txt_user = $_POST['txtunama'];
    $txt_pass = md5($_POST['txtnpass']);
    $datein = date('Y-m-d');

        $qinsert = mysqli_query($koneksidb, "INSERT INTO tst_request (username, password_baru, date_request) 
        VALUES ('$txt_user', '$txt_pass', '$datein')")or die(mysqli_error($koneksidb));
            if($qinsert){
                header("Location: index.php?page=lupapassword");
            }
    }
?>
<!-- form lupa password -->
<div class="container pb-5">
	<div class="row">
		<div class="col-md-1 pt-4"></div>
		<div class="col-md-10 pt-4">
			<div class="subkategori p-3" id="">
				<h5 class="text-center pb-2"><b>Form Lupa password</b></h5>
				<div class="row">
					<div class="col-md-2"></div>
					<div class="col-md-10">
						<form action="?page=lupapassword&btn=btnreq" id="" method="post">
						<div class="row pb-1">
							<label for="txtnama" class="col-md-3">Ussername</label>
							<div class="col-md-6">
								<input type="text" name="txtunama" id="" class="form-control" />
							</div>
						</div>
						<div class="row pb-1">
							<label for="txtpass" class="col-md-3">Password Baru</label>
							<div class="col-md-6">
								<input type="Password" name="txtnpass" id="" class="form-control" />
							</div>
						</div>
						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-6">
								 <button name="" type="submit" class="form-control btn btn-warning">Request Password</button>
							</div>
						</div>		
						</form>
					</div>
				</div>
			</div>
            </div>
        </div>
</div>


