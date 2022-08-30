<?php
require('mail/sendmail.php');
?>
<?php
if (isset($_POST['themgiohang'])) {
    $tensanpham = $_POST['tensanpham'];
    $sanpham_id = $_POST['sanpham_id'];
    $giasanpham = $_POST['sanphamgia'];
    $hinhanh = $_POST['hinhanh'];
    $soluong = $_POST['soluong'];

    $sql_select_giohang = mysqli_query($con, "SELECT * from giohang where sanpham_id=$sanpham_id"); //cộng 1 khi trùng sp
    $count = mysqli_num_rows($sql_select_giohang);
    if ($count > 0) {
        $row_sanpham = mysqli_fetch_array($sql_select_giohang);
        $soluong = $row_sanpham['soluong'] + 1;
        $sql_giohang = "UPDATE giohang SET soluong = $soluong where sanpham_id = $sanpham_id";
    } else {
        $soluong = $soluong;
        $sql_giohang = "INSERT INTO giohang(tensanpham,sanpham_id,giasanpham,hinhanh,soluong)
                    value('$tensanpham','$sanpham_id','$giasanpham','$hinhanh','$soluong')";
    }
    $insert_row = mysqli_query($con, $sql_giohang);
    if ($insert_row == 0) {
        header('Location:index.php?quanly=chitietsanpham&id=' . $sanpham_id);
    }
} elseif (isset($_POST['capnhat'])) {
    for ($i = 0; $i < count($_POST['product_id']); $i++) {
        $sanpham_id = $_POST['product_id'][$i];
        $soluong = $_POST['soluong'][$i];
        $sql_update = mysqli_query($con, "UPDATE giohang SET soluong = '$soluong' where sanpham_id = '$sanpham_id'");
    }
} elseif (isset($_GET['xoa'])) {
    $id = $_GET['xoa'];
    $sql_delete = mysqli_query($con, "DELETE FROM giohang where giohang_id= '$id'");
}
?>
<?php
$sql_laygiohang = mysqli_query($con, "SELECT * from giohang order by giohang_id DESC");
?>
<?php
$sql_giohang_select = mysqli_query($con, "SELECT * FROM giohang");
$count_giohang_select = mysqli_num_rows($sql_giohang_select);
if ($count_giohang_select > 0) {
?>
    <?php

    if (isset($_POST['thanhtoan'])) {
        
        if (!isset($_SESSION['dangnhap_home'])) {

            echo "<script>alert('Bạn cần đăng nhập để có thể mua hàng')</script>";

        } else {

            if (isset($_SESSION['khuyenmai'])) {

                $makh = $_SESSION['khuyenmai'];
            
                unset($_SESSION['khuyenmai']);

            }
            $khachhang_id = $_SESSION['khachhang_id'];

            $ngaythang = date('Y/m/d H:i:s');

            $tongtien = $_POST['tongtien'];

            $tongthanhtoan  = $_POST['tongthanhtoan'];

            $sql_donhang = mysqli_query($con, "INSERT INTO donhang(khachhang_id,ngaythang,makhuyenmai,tongtien,tongthanhtoan) 
                        VALUES ('$khachhang_id','$ngaythang','$makh','$tongtien','$tongthanhtoan')");

            $sql_donhang_select = mysqli_query($con, "SELECT donhang_id FROM donhang where khachhang_id= '$khachhang_id' AND ngaythang = '$ngaythang'");

            $row_donhang_select = mysqli_fetch_array($sql_donhang_select);

            $donhang_id = $row_donhang_select['donhang_id'];

            for ($i = 0; $i < count($_POST['thanhtoan_product_id']); $i++) {

                $sanpham_id = $_POST['thanhtoan_product_id'][$i];

                $soluong = $_POST['thanhtoan_soluong'][$i];


                $sql_giaodich = mysqli_query($con, "INSERT INTO chitiet_donhang(donhang_id,sanpham_id,soluong)
                        VALUES ('$donhang_id','$sanpham_id','$soluong')");

                $sql_delete_thanhtoan = mysqli_query($con, "DELETE FROM giohang WHERE sanpham_id = '$sanpham_id'");


                // cập nhật sản phẩm active = 1 khi mua hết hàng 
                $sql_sanpham_select = mysqli_query($con, "SELECT * FROM sanpham order by sanpham_id DESC");
                
                $row_sanpham_select = mysqli_fetch_array($sql_sanpham_select);

                $active = 1;
                if ($row_sanpham_select['sanpham_soluong'] == 0) {
                    $sql_update_active = mysqli_query($con, "UPDATE sanpham SET sanpham_active = '$active'  where sanpham_id = '$sanpham_id'");
                }
            }

            $thongbao = "<script>alert('Đặt hàng thành công')</script>";
            echo $thongbao;




            // Gửi mail
            // $tieude = "Đặt hàng thành công";
            // $noidung = "<p>Cảm ơn quý khách đã đặt hàng với mã đơn hàng là: $donhang_id</p>";
            // $noidung .="<h4>Đơn hàng bạn đặt bao gồm:</h4>";
            // $tonggia = 0;
            // while($row_giohang =mysqli_fetch_array($sql_laygiohang)){
            //     $gia= $row_giohang['giasanpham'] * $row_giohang['soluong'];
            //     $tonggia += $gia;
            //     $noidung.= "
            //     <ul style='border: 1px solid #c0392b;margin:10px'>
            //         <li>Mã sản phẩm: ".$row_giohang['sanpham_id']."</li>
            //         <li>Tên sản phẩm: ".$row_giohang['tensanpham']."</li>
            //         <li>Số lượng: ".$row_giohang['soluong']."</li>
            //         <li>Giá sản phẩm: ".number_format($gia)."<sup>đ</sup></li>                                                                      
            //     </ul>

            //     ";

            // }
            // $noidung.="<li style='font-size: 22px; font-weight:700'>Tổng giá trị đơn hàng: ".number_format($tonggia)."<sup>đ</sup></li>  ";

            // $maildathang = $_SESSION['email'];
            // $mail = new Mailer();
            // $mail->dathangmail($tieude,$noidung,$maildathang);
        }
    }
    ?>
    <!--  trừ số lượng sản phẩm khách đã mua -->
    <?php
    if (isset($sql_donhang)) {
        for ($i = 0; $i < count($_POST['thanhtoan_product_id']); $i++) {
            
            $sanpham_id = $_POST['thanhtoan_product_id'][$i];
            $soluong = $_POST['thanhtoan_soluong'][$i];


            $sql_trusoluong_sanpham = mysqli_query($con, "UPDATE sanpham SET sanpham_soluong = sanpham_soluong -  '$soluong' 
                        where sanpham_id = '$sanpham_id'");
        }
    }

    ?>
    <?php
    if (isset($thongbao)) {
        echo '    <section class="u-clearfix u-section-1" id="sec-d2d3">
                <div class="u-clearfix u-sheet u-valign-middle u-sheet-1">
                  <div class="u-align-center u-container-style u-group u-group-1">
                    <div class="u-container-layout">
                      <h1 class="u-text u-text-default u-text-1">CẢM ƠN</h1>
                      <p class="u-text u-text-2">Đơn hàng đã đặt thành công! và sẽ được sớm giao đến quý khách</p>
                      <a href="index.php" class="btn-flat btn-hover"  style="    margin-top: 2%;">Về trang chủ</a>
                    </div>
                  </div>
                </div>
              </section>
              <section class="u-align-center u-clearfix u-grey-5 u-section-2" id="sec-ce44">
                <div class="u-align-left u-clearfix u-sheet u-sheet-1"></div>
              </section>';
    } else {
    ?>
        <div class="section-header">
            <h2>Giỏ hàng</h2>
        </div>
        <form action="" method="POST">
            <div class="u-clearfix u-sheet u-block-bc7e-2">
                <div class="u-cart u-block-bc7e-6">
                    <div class="u-cart-products-table u-table u-table-responsive u-block-bc7e-7">

                        <div class="hidden u-border-1 u-border-grey-dark-1 u-table-header-style-div u-block-bc7e-92"></div>
                        <div class="hidden u-border-1 u-border-grey-dark-1 u-table-footer-style-div u-block-bc7e-93"></div>
                        <div class="hidden u-border-1 u-border-grey-dark-1 u-table-body-style-div u-block-bc7e-94"></div>

                        <table class="u-table-entity u-block-bc7e-12">

                            <colgroup>
                                <col width="65%">
                                <col width="15%">
                                <col width="15%">
                                <col width="15%">
                            </colgroup>
                            <thead class="u-table-header u-block-bc7e-13" style="background-color:#c0392b;color:white">
                                <tr style="height: 46px;">
                                    <th class="u-border-1 u-border-grey-dark-1 u-table-cell u-block-bc7e-14">Sản phẩm </th>
                                    <th class="u-border-1 u-border-grey-dark-1 u-table-cell u-block-bc7e-15">Giá </th>
                                    <th class="u-border-1 u-border-grey-dark-1 u-table-cell u-block-bc7e-16">Số lượng </th>
                                    <th class="u-border-1 u-border-grey-dark-1 u-table-cell u-block-bc7e-17">Thành tiền </th>
                                </tr>
                            </thead>
                            <tbody class="u-table-body u-block-bc7e-18">
                                <?php
                                $total = 0;
                                while ($row_fetch_giohang = mysqli_fetch_array($sql_laygiohang)) {
                                    $subtotal = $row_fetch_giohang['soluong'] * $row_fetch_giohang['giasanpham'];
                                    $total += $subtotal;
                                ?>
                                    <tr style="height: 78px;">
                                        <td class="u-border-1 u-border-grey-dark-1 u-table-cell u-block-bc7e-19">
                                            <a href="?quanly=giohang&xoa=<?php echo $row_fetch_giohang['giohang_id'] ?>" onclick="return confirm('bạn có chắc muốn xóa sản phẩm này không')"><i class='bx bxs-trash'></i></a>
                                            <img class="u-cart-product-image u-image u-image-default u-product-control u-block-bc7e-21" src="upload/<?= $row_fetch_giohang['hinhanh'] ?>">
                                            <h3 class="u-cart-product-title u-product-control u-text u-block-bc7e-22">
                                                <a class="u-product-title-link" href="?quanly=chitietsanpham&id=<?= $row_fetch_giohang['sanpham_id'] ?>"><?= $row_fetch_giohang['tensanpham'] ?></a>
                                            </h3>
                                        </td>
                                        <td class="u-border-1 u-border-grey-dark-1 u-table-cell u-block-bc7e-23">
                                            <div class="u-cart-product-price u-product-control u-product-price u-block-bc7e-24">
                                                <div class="u-price-wrapper">

                                                    <div class="u-price"><?php echo number_format($row_fetch_giohang['giasanpham']) ?><sup>đ</sup></div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="u-border-1 u-border-grey-dark-1 u-table-cell u-block-bc7e-25">
                                            <div class="u-cart-product-quantity u-product-control u-product-quantity u-block-bc7e-26">
                                                <div class="u-border-1 u-border-grey-25 u-quantity-input">
                                                    <input class="u-border-grey-30 u-input u-block-bc7e-27" name="soluong[]" type="number" min="1" value="<?= $row_fetch_giohang['soluong'] ?>" pattern="[0-9]+">
                                                    <input type="hidden" name="product_id[]" value="<?= $row_fetch_giohang['sanpham_id'] ?>">
                                                </div>
                                            </div>
                                        </td>
                                        <td class="u-border-1 u-border-grey-dark-1 u-table-cell u-block-bc7e-28">
                                            <div class="u-cart-product-subtotal u-product-control u-product-price u-block-bc7e-29">
                                                <div class="u-price-wrapper">
                                                    <div class="u-hide-price u-old-price"></div>
                                                    <div class="u-price" style="font-weight: 700;"><?= number_format($subtotal) ?><sup>đ</sup></div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php

                                }

                                ?>
                            </tbody>

                        </table>
                    </div>

                    <div class="u-cart-button-container">
                        <a href="index.php" class="u-active-none u-btn u-button-style u-cart-continue-shopping u-hover-none u-none u-text-body-color u-block-bc7e-58"><span class="u-icon u-block-bc7e-59"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" xml:space="preserve" class="u-svg-content" viewBox="0 0 443.52 443.52" x="0px" y="0px" style="width: 1em; height: 1em;">
                                    <g>
                                        <g>
                                            <path d="M143.492,221.863L336.226,29.129c6.663-6.664,6.663-17.468,0-24.132c-6.665-6.662-17.468-6.662-24.132,0l-204.8,204.8    c-6.662,6.664-6.662,17.468,0,24.132l204.8,204.8c6.78,6.548,17.584,6.36,24.132-0.42c6.387-6.614,6.387-17.099,0-23.712    L143.492,221.863z"></path>
                                        </g>
                                    </g>
                                </svg><img></span>&nbsp;Tiếp tục mua hàng
                        </a>
                        <button type="submit" name="capnhat" class="u-btn u-button-style u-cart-update u-grey-5 u-block-bc7e-60">Cập nhật giỏ hàng</button>
                    </div>
        </form>
        <div class="u-cart-blocks-container">
            <div class="u-cart-block u-indent-30">
                <div class="u-cart-block-container u-clearfix">
                    <?php

                    $phantramgiam = 0;
                    $total_giamgia = 0;
                    $ship = 25000;
                    $price_total = $total  + $ship;

                    if (isset($_POST['apdung'])) {
                   
                        $magiamgia =  $_POST['magiamgia'];

                        $sql_makhuyenmai = mysqli_query($con, "SELECT * FROM khuyenmai where makhuyenmai = '$magiamgia'  ");
                        
                        if (!isset($_SESSION['khuyenmai'])) {

                            $_SESSION['khuyenmai'] = $magiamgia;

                        }
                       
                        $count_makhuyenmai = mysqli_num_rows($sql_makhuyenmai);

                        $row_makhuyenmai = mysqli_fetch_array($sql_makhuyenmai);

                        if ($row_makhuyenmai == 0) {

                            $total_giamgia = $price_total;

                            unset($_SESSION['khuyenmai']);
                            
                            echo "<script>alert('Mã khuyến mã sai ')</script>";
                        } else {

                            $ngayhienhanh =  date('Y/m/d');

                            // echo "<script>alert('$ngayhienhanh ')</script>";

                            $today_time = strtotime($ngayhienhanh);
                            $ngaybatdau = strtotime($row_makhuyenmai['ngaybatdau']);
                            $ngayketthuc = strtotime($row_makhuyenmai['ngayketthuc']);
                            $kt_makm = $row_makhuyenmai['makhuyenmai'];

                            if (($ngaybatdau <= $today_time) and ($today_time <= $ngayketthuc)) {

                                //  kt ng dùng nhập mã 1 lần
                                $ma = $_SESSION['khuyenmai'];

                                $id_khachhang = $_SESSION['khachhang_id'];

                                $sql_check_mgg_donhang = mysqli_query($con, "SELECT * FROM donhang,khuyenmai 
                                    where donhang.makhuyenmai = khuyenmai.makhuyenmai AND donhang.makhuyenmai = '$kt_makm' 
                                        AND  donhang.khachhang_id =  '$id_khachhang'");

                                $count_check = mysqli_num_rows($sql_check_mgg_donhang);

                                if($count_check >0 ){

                                    echo "<script>alert('Mã giảm giá đã được sử dụng')</script>";

                                    $total_giamgia = $price_total;

                                    unset($_SESSION['khuyenmai']);

                                }
                                else{
                                // end kt ng dùng nhập mã 1 lần

  

                                if ($row_makhuyenmai['hinhthuckhuyenmai'] == 1) {

                                    $phantramgiam = $price_total  * ($row_makhuyenmai['giagiam'] / 100);

                                } else {

                                    $phantramgiam =  $row_makhuyenmai['giagiam'];

                                }

                                $total_giamgia = ($total  + $ship)  - $phantramgiam;


                                echo "<script>alert('Áp dụng mã giảm giá thành công')</script>";
                                }
                            } else {

                                echo "<script>alert('Mã khuyến đã hết hạn')</script>";

                                unset($_SESSION['khuyenmai']);
                            
                            }
                        }
                    } else {

                        $total_giamgia = $price_total;
                    }
                    ?>
                    <h5 class="u-cart-block-header u-text u-block-bc7e-61">Mã khuyến mãi</h5>
                    <div class="u-cart-block-content u-text u-block-bc7e-62">
                        <div class="u-cart-form u-form u-block-bc7e-63">

                            <form action="" method="POST" class="u-clearfix u-form-horizontal u-form-spacing-10 u-inner-form" source="custom" name="form">
                                <div class="u-form-group u-block-bc7e-64">
                                    <input type="text" placeholder="Nhập mã khuyến mãi" id="name-5861" name="magiamgia" class="u-border-1 u-border-grey-30 u-input u-input-rectangle u-block-bc7e-66">
                                </div>
                                <div class="u-align-left u-form-group u-form-submit u-block-bc7e-67">

                                    <button type="submit" class="u-btn u-btn-submit u-button-style u-block-bc7e-68" name="apdung">Áp dụng</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="u-cart-block u-cart-totals-block u-indent-30">
                <form action="" method="POST">
                    <div class="u-cart-block-container u-clearfix">
                        <h5 class="u-cart-block-header u-text u-block-bc7e-69">Thanh toán</h5>
                        <div class="u-align-right u-cart-block-content u-text u-block-bc7e-70">
                            <div class="u-cart-totals-table u-table u-table-responsive u-block-bc7e-71">

                                <table class="u-table-entity u-block-bc7e-75">
                                    <colgroup>
                                        <col width="50%">
                                        <col width="50%">
                                    </colgroup>


                                    <div class="hidden u-border-1 u-border-grey-dark-1 u-table-header-style-div u-block-bc7e-92"></div>
                                    <div class="hidden u-border-1 u-border-grey-dark-1 u-table-footer-style-div u-block-bc7e-93"></div>
                                    <div class="hidden u-border-1 u-border-grey-dark-1 u-table-body-style-div u-block-bc7e-94"></div>

                                    <tbody class="u-align-right u-table-body u-block-bc7e-80">
                                        <tr style="height: 46px;">
                                            <td class="u-align-left u-border-1 u-border-grey-dark-1 u-first-column u-table-cell u-block-bc7e-81">Tổng tiền</td>
                                            <td class="u-border-1 u-border-grey-dark-1 u-table-cell u-block-bc7e-82"> <?php echo number_format($total) ?><sup>đ</sup></td>
                                            <input type="hidden" name="tongtien" value="<?= $total ?>">
                                        </tr>
                                        <tr style="height: 46px;">
                                            <td class="u-align-left u-border-1 u-border-grey-dark-1 u-first-column u-table-cell u-block-bc7e-81">Phí vận chuyển</td>
                                            <td class="u-border-1 u-border-grey-dark-1 u-table-cell u-block-bc7e-82"><?php echo number_format($ship) ?><sup>đ</sup></td>
                                        </tr>

                                        <tr style="height: 46px;">
                                            <td class="u-align-left u-border-1 u-border-grey-dark-1 u-first-column u-table-cell u-block-bc7e-81">Khuyến mãi </td>
                                            <td class="u-border-1 u-border-grey-dark-1 u-table-cell u-block-bc7e-82">-<?php echo number_format($phantramgiam) ?><sup>đ</sup></td>

                                        </tr>


                                        <tr style="height: 46px;">
                                            <td class="u-align-left u-border-1 u-border-grey-dark-1 u-first-column u-table-cell u-block-bc7e-83">Tổng thanh toán</td>
                                            <td class="u-border-1 u-border-grey-dark-1 u-table-cell u-block-bc7e-84"><?php echo number_format($total_giamgia) ?><sup>đ</sup></td>
                                            <input type="hidden" name="tongthanhtoan" value="<?= $total_giamgia ?>">
                                        </tr>
                                    </tbody>

                                </table>
                            </div>
                            <?php
                            while ($row1 = mysqli_fetch_array($sql_giohang_select)) {
                            ?>
                                <input type="hidden" name="thanhtoan_product_id[]" value="<?php echo $row1['sanpham_id'] ?>">
                                <input type="hidden" name="thanhtoan_soluong[]" value="<?php echo $row1['soluong'] ?>">
                            <?php
                            }
                            ?>
                            <input type="submit" name="thanhtoan" class="u-btn u-button-style u-cart-checkout-btn u-block-bc7e-89" value="Thanh toán">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </section>
        </div>
        </div>
        </div>
    <?php
    }
} else {
    ?>
    <section class="u-clearfix u-section-1" id="sec-3199" style="margin-top: 5%;">
        <div class="u-clearfix u-sheet u-sheet-1">
            <img class="u-image u-image-circle u-preserve-proportions u-image-1" src="images/579f1b805f8ff26f34e536465cd0948d48c765de0c314554241af02f9492089e2110a187661259d2bf721ef9be31ba212a0d6ce1a3785eb8292f5b_1280.jpg" alt="" data-image-width="1280" data-image-height="1280">
            <h2 style="text-align: center;"> Giỏ hàng của bạn đang trống</h2>
            <a href="index.php" class="u-border-2 u-border-black u-btn u-button-style u-hover-black u-none u-text-black u-text-hover-white u-btn-1">Mua ngay</a>
        </div>
    </section>

<?php
}
?>
</div>
<style data-mode="XL" data-visited="true">
    @media (min-width: 1200px) {
        .u-block-bc7e-2 {
            min-height: 500px;
        }

        .u-block-bc7e-6 {
            width: 1140px;
            margin-top: 63px;
            margin-bottom: 60px;
            min-height: 375px;
        }

        .u-block-bc7e-20 {
            font-size: 1.5em;
            margin-right: 10px;
        }

        .u-block-bc7e-22 {
            font-size: 1rem;
        }

        .u-block-bc7e-26 {
            width: 100px;
        }

        .u-block-bc7e-31 {
            font-size: 1.5em;
            margin-right: 10px;
        }

        .u-block-bc7e-33 {
            font-size: 1rem;
        }

        .u-block-bc7e-37 {
            width: 100px;
        }

        .u-block-bc7e-42 {
            font-size: 1.5em;
            margin-right: 10px;
        }

        .u-block-bc7e-44 {
            font-size: 1rem;
        }

        .u-block-bc7e-48 {
            width: 100px;
        }

        .u-block-bc7e-58 {
            padding-top: 10px;
            padding-right: 14px;
            padding-bottom: 10px;
            padding-left: 14px;
        }

        .u-block-bc7e-90 {
            font-weight: 700;
        }

        .u-block-bc7e-81 {
            font-weight: 700;
        }

        .u-block-bc7e-83 {
            font-weight: 700;
        }

        .u-block-bc7e-84 {
            font-weight: 700;
        }

        .u-block-bc7e-89 {
            margin-top: 20px;
        }
    }
</style>
<style data-mode="LG">
    @media (max-width: 1199px) and (min-width: 992px) {
        .u-block-bc7e-2 {
            min-height: 500px;
        }

        .u-block-bc7e-6 {
            width: 940px;
            margin-top: 63px;
            margin-bottom: 60px;
            min-height: 375px;
        }

        .u-block-bc7e-20 {
            font-size: 1.5em;
            margin-right: 10px;
        }

        .u-block-bc7e-22 {
            font-size: 1rem;
        }

        .u-block-bc7e-26 {
            width: 100px;
        }

        .u-block-bc7e-31 {
            font-size: 1.5em;
            margin-right: 10px;
        }

        .u-block-bc7e-33 {
            font-size: 1rem;
        }

        .u-block-bc7e-37 {
            width: 100px;
        }

        .u-block-bc7e-42 {
            font-size: 1.5em;
            margin-right: 10px;
        }

        .u-block-bc7e-44 {
            font-size: 1rem;
        }

        .u-block-bc7e-48 {
            width: 100px;
        }

        .u-block-bc7e-58 {
            padding-top: 10px;
            padding-right: 14px;
            padding-bottom: 10px;
            padding-left: 14px;
        }

        .u-block-bc7e-90 {
            font-weight: 700;
        }

        .u-block-bc7e-81 {
            font-weight: 700;
        }

        .u-block-bc7e-83 {
            font-weight: 700;
        }

        .u-block-bc7e-84 {
            font-weight: 700;
        }

        .u-block-bc7e-89 {
            margin-top: 20px;
        }
    }
</style>
<style data-mode="MD">
    @media (max-width: 991px) and (min-width: 768px) {
        .u-block-bc7e-2 {
            min-height: 500px;
        }

        .u-block-bc7e-6 {
            width: 720px;
            margin-top: 63px;
            margin-bottom: 60px;
            min-height: 375px;
        }

        .u-block-bc7e-20 {
            font-size: 1.5em;
            margin-right: 10px;
        }

        .u-block-bc7e-22 {
            font-size: 1rem;
        }

        .u-block-bc7e-26 {
            width: 100px;
        }

        .u-block-bc7e-31 {
            font-size: 1.5em;
            margin-right: 10px;
        }

        .u-block-bc7e-33 {
            font-size: 1rem;
        }

        .u-block-bc7e-37 {
            width: 100px;
        }

        .u-block-bc7e-42 {
            font-size: 1.5em;
            margin-right: 10px;
        }

        .u-block-bc7e-44 {
            font-size: 1rem;
        }

        .u-block-bc7e-48 {
            width: 100px;
        }

        .u-block-bc7e-58 {
            padding-top: 10px;
            padding-right: 14px;
            padding-bottom: 10px;
            padding-left: 14px;
        }

        .u-block-bc7e-90 {
            font-weight: 700;
        }

        .u-block-bc7e-81 {
            font-weight: 700;
        }

        .u-block-bc7e-83 {
            font-weight: 700;
        }

        .u-block-bc7e-84 {
            font-weight: 700;
        }

        .u-block-bc7e-89 {
            margin-top: 20px;
        }
    }
</style>
<style data-mode="SM">
    @media (max-width: 767px) and (min-width: 576px) {
        .u-block-bc7e-2 {
            min-height: 500px;
        }

        .u-block-bc7e-6 {
            width: 540px;
            margin-top: 63px;
            margin-bottom: 60px;
            min-height: 375px;
        }

        .u-block-bc7e-20 {
            font-size: 1.5em;
            margin-right: 10px;
        }

        .u-block-bc7e-22 {
            font-size: 1rem;
        }

        .u-block-bc7e-26 {
            width: 100px;
        }

        .u-block-bc7e-31 {
            font-size: 1.5em;
            margin-right: 10px;
        }

        .u-block-bc7e-33 {
            font-size: 1rem;
        }

        .u-block-bc7e-37 {
            width: 100px;
        }

        .u-block-bc7e-42 {
            font-size: 1.5em;
            margin-right: 10px;
        }

        .u-block-bc7e-44 {
            font-size: 1rem;
        }

        .u-block-bc7e-48 {
            width: 100px;
        }

        .u-block-bc7e-58 {
            padding-top: 10px;
            padding-right: 14px;
            padding-bottom: 10px;
            padding-left: 14px;
        }

        .u-block-bc7e-90 {
            font-weight: 700;
        }

        .u-block-bc7e-81 {
            font-weight: 700;
        }

        .u-block-bc7e-83 {
            font-weight: 700;
        }

        .u-block-bc7e-84 {
            font-weight: 700;
        }

        .u-block-bc7e-89 {
            margin-top: 20px;
        }
    }
</style>
<style data-mode="XS">
    @media (max-width: 575px) {
        .u-block-bc7e-2 {
            min-height: 500px;
        }

        .u-block-bc7e-6 {
            width: 340px;
            margin-top: 63px;
            margin-bottom: 60px;
            min-height: 375px;
        }

        .u-block-bc7e-20 {
            font-size: 1.5em;
            margin-right: 10px;
        }

        .u-block-bc7e-22 {
            font-size: 1rem;
        }

        .u-block-bc7e-26 {
            width: 100px;
        }

        .u-block-bc7e-31 {
            font-size: 1.5em;
            margin-right: 10px;
        }

        .u-block-bc7e-33 {
            font-size: 1rem;
        }

        .u-block-bc7e-37 {
            width: 100px;
        }

        .u-block-bc7e-42 {
            font-size: 1.5em;
            margin-right: 10px;
        }

        .u-block-bc7e-44 {
            font-size: 1rem;
        }

        .u-block-bc7e-48 {
            width: 100px;
        }

        .u-block-bc7e-58 {
            padding-top: 10px;
            padding-right: 14px;
            padding-bottom: 10px;
            padding-left: 14px;
        }

        .u-block-bc7e-90 {
            font-weight: 700;
        }

        .u-block-bc7e-81 {
            font-weight: 700;
        }

        .u-block-bc7e-83 {
            font-weight: 700;
        }

        .u-block-bc7e-84 {
            font-weight: 700;
        }

        .u-block-bc7e-89 {
            margin-top: 20px;
        }
    }
</style>