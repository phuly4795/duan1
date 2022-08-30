<?php
session_start();

include('../db/conn.php')
?>

<?php
include('../mail/sendmail.php');
?>
<?php
if (isset($_POST['quenmk'])) {

	$email = $_POST['email'];

	if ($email == '') {
		echo "<script>alert('Bạn chưa nhập địa chỉ email')</script>";
	} else {
		$sql_select_quenmk = mysqli_query($con, "SELECT * FROM khachhang where email = '$email' ");
		$count = mysqli_num_rows($sql_select_quenmk);
		$row_quenmk = mysqli_fetch_array($sql_select_quenmk);
		if ($count > 0) {

			$thongbao = $row_quenmk['password'];
			echo "<script>alert('Mật khẩu đã được gửi vào email!')</script>";


			// Sinh mk ngẫu nhiên 
			$pass_lenght = 8;

			// Thêm một ký hiệu vào mật khẩu

			$symbol = '!@#$%^&*()-_=[]{};:,.<>';           //chuỗi ký hiệu sẽ lấy ra 
			$symbol_count = strlen($symbol);
			$index = mt_rand(0, $symbol_count - 1);       // chọn một vị trí ngẫu nhiên
			$pass = substr($symbol, $index, 1);            //thêm một ký hiệu
			$pass .= chr(mt_rand(48, 57));                // thêm mốt số 
			$pass .= chr(mt_rand(65, 90));                   // thêm  1 chữ hoa
			//thêm các chữ thường cho tới khi đạt tới độ dài cần thiết 

			while (strlen($pass) < ($pass_lenght)) {
				$pass .= chr(mt_rand(97, 122));
			}

			$pass = str_shuffle($pass);                    // tráo ngẫu nhiên các ký tự

			$sql_update_mk = mysqli_query($con, "UPDATE khachhang set password  = '$pass'  where email = '$email'");

			// Gửi mail
			$tieude = "Cấp lại mật khẩu";
			$noidung = "<p>Mật khẩu được cấp lại của quý khách là: <span style='color: indianred;'>$pass</span></p>";


			$maildathang = $email;
			$mail = new Mailer();
			$mail->dathangmail($tieude, $noidung, $maildathang);


			// header('Location:./login.php');
		} else {
			echo "<script>alert('Địa chỉ email không tồn tại!')</script>";
		}
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

	<title>Đăng nhập</title>
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
				<form class="login100-form validate-form" action="" method="POST">
					<span class="login100-form-title p-b-33">
						Quên mật khẩu
					</span>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="email" placeholder="Nhập email">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="container-login100-form-btn m-t-20">
						<input type="submit" name="quenmk" class="login100-form-btn" value="Xác nhận">
					</div>

					<div class="text-center p-t-45 p-b-4">
						<span class="txt1">
							Quay lại trang
						</span>

						<a href="./login.php" class="txt2 hov1">
							đăng nhập.
						</a>
					</div>

				</form>
			</div>
		</div>
	</div>

</body>

</html>