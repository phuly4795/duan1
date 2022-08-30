<?php


if (isset($_POST['submit'])) {

  $name = $_POST['name'];
  $email = $_POST['email'];
  $address = $_POST['address'];
  $phone = $_POST['phone'];
  $hinhanh = $_FILES['hinhanh']['name'];
  $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
  $path = './upload/';


  if ($hinhanh == '') {
    $sql_update_kh = mysqli_query($con, "UPDATE khachhang SET name = '$name', phone = '$phone', address = '$address', email = '$email'
      where khachhang_id = " . $_SESSION['khachhang_id']);
  } else {
    $sql_update_kh = mysqli_query($con, "UPDATE khachhang SET name = '$name', phone = '$phone', address = '$address', email = '$email',
   khachhang_img = '$hinhanh'
      where khachhang_id = " . $_SESSION['khachhang_id']);
  }

  move_uploaded_file($hinhanh_tmp, $path . $hinhanh);
}
$sql_select_kh = mysqli_query($con, "SELECT * from khachhang where khachhang_id = " . $_SESSION['khachhang_id']);

?>


<section class="u-align-center u-clearfix u-white u-section-1" id="carousel_4b6b">
  <div class="u-clearfix u-sheet u-valign-middle-lg u-valign-middle-md u-valign-middle-sm u-valign-middle-xs u-sheet-1">
    <h1 class="u-custom-font u-font-raleway u-text u-text-default u-text-palette-2-base u-text-1">Hồ sơ</h1>
    <p class="u-large-text u-text u-text-variant u-text-2"> Quản lý thông tin hồ sơ để bảo mật tài khoản</p>
    <?php
    while ($row_select_kh = mysqli_fetch_array($sql_select_kh)) {
    ?>



      <div class="u-expanded-width-xs u-form u-form-1">

        <form action="" method="POST" class="u-clearfix u-form-spacing-10 u-form-vertical u-inner-form" source="custom" name="form" style="padding: 10px;" enctype="multipart/form-data">

          <div class="u-form-group u-form-name">
            <img class="u-expanded-width-md u-expanded-width-sm u-expanded-width-xs u-image u-image-round u-radius-20 u-image-1" alt="" data-image-width="997" data-image-height="700" src="upload/<?= $row_select_kh['khachhang_img'] ?>"><Br>
            <input type="file" class="form-control" name="hinhanh" style="margin-left: 30%;">

          </div>

          <div class="u-form-group u-form-name">
            <label for="name-c28b" class="u-label">Họ và tên</label>
            <input type="text" placeholder="Nhập họ và tên" id="name-c28b" value="<?= $row_select_kh['name'] ?>" name="name" class="u-border-3 u-border-grey-30 u-input u-input-rectangle u-radius-16 u-white u-input-1" required="">
          </div>
          <!-- <div class="u-form-group u-form-group-2">
            <label for="text-f086" class="u-label">Mật khẩu</label>
            <input type="text" placeholder="Mật khẩu" id="text-f086" value="<?= $row_select_kh['password'] ?>" name="password" class="u-border-3 u-border-grey-30 u-input u-input-rectangle u-radius-16 u-white u-input-2">
          </div> -->

          <div class="u-form-email u-form-group u-form-group-3">
            <label for="text-e7a9" class="u-label">Địa chỉ email</label>
            <input type="email" id="text-e7a9" name="email" value="<?= $row_select_kh['email'] ?>" class="u-border-3 u-border-grey-30 u-input u-input-rectangle u-radius-16 u-white u-input-3" placeholder="Nhập địa chỉ email">
          </div>
          <div class="u-form-group">
            <label for="email-c28b" class="u-label">Địa chỉ</label>
            <input type="text" placeholder="nhập địa chỉ" id="email-c28b" name="address" value="<?= $row_select_kh['address'] ?>" class="u-border-3 u-border-grey-30 u-input u-input-rectangle u-radius-16 u-white u-input-4" required="required">
          </div>
          <div class="u-form-group u-form-phone">
            <label for="message-c28b" class="u-label">Số điện thoại</label>
            <input placeholder="Nhập số điện thoại" rows="4" cols="50" id="message-c28b" name="phone" value="<?= $row_select_kh['phone'] ?>" class="u-border-3 u-border-grey-30 u-input u-input-rectangle u-radius-16 u-white u-input-5" required="required" type="tel">
          </div>
          <div class="u-align-center u-form-group u-form-submit">
            <button style="width: 30%;" name="submit" class="u-active-palette-2-light-1 u-border-none u-btn u-btn-submit u-button-style u-hover-palette-2-light-1 u-palette-2-base u-btn-1">Lưu</button>
          </div>

        </form>

      <?php
    }
      ?>

      </div>
  </div>
</section>