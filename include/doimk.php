<?php
if (isset($_POST['doimk'])) {

    $pass_old = $_POST['pass_old'];

    $pass_new = $_POST['pass_new'];

    $replay = $_POST['replay'];

    $id_kh = $_SESSION['khachhang_id'];

    $sql_select_mk = mysqli_query($con, "SELECT * FROM khachhang where khachhang_id = '$id_kh' ");

    $row_mk = mysqli_fetch_array($sql_select_mk);

    $mk_now =  $row_mk['password'];

    if ($mk_now != $pass_old) {

        echo "<script>alert('Nhập sai mật khẩu')</script>";

        if ($pass_new != $replay) {

            echo "<script>alert('Mật khẩu không trùng nhau')</script>";
        }
        
    } else {

        $sql_update_mk = mysqli_query($con, "UPDATE khachhang SET password = '$replay' where khachhang_id = '$id_kh'  ");

        echo "<script>alert('Đổi mật khẩu thành công')</script>";

    }
}

?>



<section class="u-align-center u-clearfix u-section-1" id="sec-9c51">
    <div class="u-clearfix u-sheet u-sheet-1">
        <h1 class="u-text u-text-default u-title u-text-1" style="width: 100%;">ĐỔI MẬT KHẨU</h1>
        <div class="u-form u-form-1">
            <form action="" method="POST" onsubmit="return kt()" class="u-clearfix u-form-spacing-31 u-form-vertical u-inner-form" source="custom" name="form" style="padding: 16px;">

                <div class="u-form-group u-form-name">
                    <label for="name-144c" class="u-custom-font u-font-roboto u-label u-label-1">Mật khẩu hiện tại</label>
                    <input type="password" placeholder="Nhập mật khẩu" id="name-144c" name="pass_old" class="u-border-2 u-border-grey-30 u-input u-input-rectangle u-radius-8 u-white" required="">
                </div>
                <div class="u-form-group">
                    <label for="message-144c" class="u-custom-font u-font-roboto u-label u-label-2">Mật khẩu mới</label>
                    <input type="password" placeholder="Nhập mật khẩu mới" rows="4" cols="50" id="pass_new" name="pass_new" class="u-border-2 u-border-grey-30 u-input u-input-rectangle u-radius-8 u-white" required="required" type="text">
                </div>
                <div class="u-form-email u-form-group">
                    <label for="email-144c" class="u-custom-font u-font-roboto u-label u-label-3">Nhập lại mật khẩu</label>
                    <input type="password" placeholder="Nhập lại mật khẩu" id="replay" name="replay" class="u-border-2 u-border-grey-30 u-input u-input-rectangle u-radius-8 u-white" required="">
                </div>
                <div class="u-align-center u-form-group u-form-submit">
                    <p id="loi" style="color: red;"></p>
                    <input type="submit" name="doimk" class="btn-flat btn-hover" value="Xác nhận">
                </div>
            </form>

        </div>
    </div>
</section>

<script>
    function kt() {

        var pass_new = document.getElementById("pass_new");
        if (pass_new.value.length < 6) {

            document.getElementById("pass_new").style.border = "thick solid red";
            document.getElementById("loi").innerHTML = "Bản phải nhập từ 6 ký tự trở lên";
            return false;
        }

        var replay = document.getElementById("replay");
        if (replay.value.length < 6) {
            document.getElementById("replay").style.border = "thick solid red";
            document.getElementById("loi").innerHTML = "Bản phải nhập từ 6 ký tự trở lên";
            return false;
        }

        return true
    }
</script>