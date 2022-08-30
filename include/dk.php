<?php
session_start();
include('../db/conn.php')
?>
<?php
if (isset($_POST['dangky'])) {
	$name  		= $_POST['name'];
	$email  	= $_POST['email'];
	$pass		= md5($_POST['pass']);
	$phone  	= $_POST['phone'];
	$address 	= $_POST['address'];


	$sql_select_kh = mysqli_query($con, "SELECT * FROM khachhang where email = '$email'  limit 1");
	$count = mysqli_num_rows($sql_select_kh);
	$row_select_kh = mysqli_fetch_array($sql_select_kh);

	if ($count > 0) {
		echo "<script>alert('Email đã được đăng ký')</script>";
		
	} else {
		$sql_dangky = mysqli_query($con, "INSERT INTO khachhang(name, phone, address, email, password, khachhang_img)
		VALUES ('$name','$phone','$address','$email','$pass','new.png')");

		$sql_select_khachhang = mysqli_query($con, "SELECT * FROM khachhang order by khachhang_id DESC LIMIT 1");
		$row_khachhang = mysqli_fetch_array($sql_select_khachhang);

		$_SESSION['dangnhap_home'] = $name;
		$_SESSION['email'] = $email;
		$_SESSION['khachhang_id'] = $row_khachhang['khachhang_id'];

		header('Location: ../index.php');
	}
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
	<title>Đăng ký</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
	<!--===============================================================================================-->
</head>

<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
				<form action="" role="form" method="POST" class="login100-form validate-form" onsubmit="return kt()">
					<span class="login100-form-title p-b-33">
						Đăng ký
					</span>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="name" placeholder="Nhập họ tên" id="name">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="wrap-input100 rs1 validate-input" data-validate="Chưa nhập mật khẩu">
						<input class="input100" type="email" name="email" placeholder="Nhập email" id="email">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="wrap-input100 rs1 validate-input" data-validate="Chưa nhập mật khẩu">
						<input class="input100" type="password" name="pass" placeholder="Nhập mật khẩu" id="pass">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="wrap-input100 rs1 validate-input" data-validate="Chưa nhập mật khẩu">
						<input class="input100" type="text" name="phone" placeholder="Số điện thoại" id="phone">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>


					<div class="wrap-input100 rs1 validate-input" data-validate="Chưa nhập mật khẩu">
						<input class="input100" type="text" name="address" placeholder="Địa chỉ" id="address">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>


					<div class="tt" style="clear:both; text-align:center">
						<h4><?php
							if (isset($thongbao) && ($thongbao != "")) echo $thongbao;
							?></h4>
						<p id="loi" style="color: red;"></p>
					</div>

					<div class="container-login100-form-btn m-t-20">
						<input type="submit" class="login100-form-btn" value="Đăng ký" name="dangky">
					</div>

					<div class="text-center" style="margin-top: 5%;">
						<span class="txt1">
							Tôi đã có tài khoản!
						</span>

						<a href="./login.php" class="txt2 hov1">
							Đăng nhập
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	<script>
		function kt() {

			var name = document.getElementById("name");
			if (name.value.length == 0) {
				document.getElementById("loi").innerHTML = "Chưa nhập họ và tên";
				return false;
			}

			var email = document.getElementById("email");
			if (email.value.length == 0) {
				document.getElementById("loi").innerHTML = "Chưa nhập email";
				return false;
			}

			var pass = document.getElementById("pass");
			if (pass.value.length == 0) {
				document.getElementById("loi").innerHTML = "Chưa nhập mật khẩu";
				return false;
			}

			var pass = document.getElementById("pass");
			if (pass.value.length < 6) {
				document.getElementById("loi").innerHTML = "Phải nhập mất khẩu ít nhất 6 ký tự";
				return false;
			}

			var phone = document.getElementById("phone");
			if (phone.value.length == 0) {
				document.getElementById("loi").innerHTML = "Chưa nhập số điện thoại";
				return false;
			}

			var address = document.getElementById("address");
			if (address.value.length == 0) {
				document.getElementById("loi").innerHTML = "Chưa nhập địa chỉ";
				return false;
			}

		}
	</script>



	<script src="./js/main.js"></script>


</body>

</html>