<?php
	session_start();
    include('../db/conn.php')
?>
<?php
	if(isset($_POST['dangnhap'])){

		$taikhoan = $_POST['email'];
		$matkhau = $_POST['pass'];

		if($taikhoan=='' || $matkhau== ''){
			echo "<script>alert('Bạn chưa nhập tài khoản hoặc mật khẩu')</script>";		
		}
        else{
            $sql_select_admin = mysqli_query($con, "SELECT * FROM admin where email = '$taikhoan' AND password = '$matkhau' limit 1");
            $count = mysqli_num_rows($sql_select_admin);
			$row_dangnhap = mysqli_fetch_array($sql_select_admin);
            if($count>0){
				$_SESSION['dangnhap'] = $row_dangnhap['admin_name'];
				$_SESSION['admin_id'] = $row_dangnhap['admin_id'];
                header('Location: ../admin/trangchu.php');
            }
			else{
                echo "<script>alert('Tài khoản hoặc mật khẩu sai')</script>";			
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
						Đăng nhập
					</span>

					<div class="wrap-input100 validate-input">
						<input class="input100" type="text" name="email" placeholder="Nhập email">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="wrap-input100 rs1 validate-input">
						<input class="input100" type="password" name="pass" placeholder="Nhập mật khẩu">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="text-center p-t-45 p-b-4">
						<span class="txt1">
							
						</span>					
					</div>

					<div class="container-login100-form-btn m-t-20">
						<input type="submit" name="dangnhap" class="login100-form-btn" value="Đăng nhập">
					</div>
								
				</form>
			</div>
		</div>
	</div>
		
</body>
</html>



