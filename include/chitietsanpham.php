<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = '';
}
$sql_chitiet = mysqli_query($con, "SELECT * FROM sanpham  where sanpham_id = '$id'");

$sql_category_chitiet = mysqli_query($con, "SELECT * FROM category,sanpham  where category.category_id = sanpham.category_id AND
                sanpham.category_id='$id' order by sanpham.sanpham_id DESC");
$row_title_chitiet = mysqli_fetch_array($sql_category_chitiet);
$title_chitiet = $row_title_chitiet['category_name'];
?>
<!-- bình luận -->

<?php
if (isset($_POST['noidung'])) {
    $noidung = $_POST['noidung'];
    if (isset($_SESSION['dangnhap_home'])) {
        $sanpham_id = $_GET['id'];
        $tenkhachhang = $_SESSION['dangnhap_home'];
        $khachhang_id = $_SESSION['khachhang_id'];
        $sql_binhluan = mysqli_query($con, "INSERT binhluan(khachhang_id,name,noidung,sanpham_id) 
                            VALUES ($khachhang_id,'$tenkhachhang','$noidung',$sanpham_id)");
        echo "<script>alert('Bình luận thành công. Bình luận của bạn sẽ sớm được hiển thị!')</script>";
    } else {
        echo "<script>alert('bạn cần đăng nhập để có thể bình luận')</script>";
    }
}
?>
<!-- product-detail content -->

<?php
while ($row_chitiet = mysqli_fetch_array($sql_chitiet)) {
?>
    <div class="bg-main">
        <div class="container">
            <div class="box">
                <div class="breadcumb">
                    <a href="index.php">Trang chủ</a>
                    <span><i class='bx bxs-chevrons-right'></i></span>


                    <a href="?quanly=chitietsanpham&id=<?= $row_chitiet['sanpham_id'] ?>"><?= $row_chitiet['sanpham_name'] ?></a>
                </div>
            </div>

            <div class="row product-row">
                <div class="col-5 col-md-12">
                    <div class="product-img" id="product-img">
                        <img src="upload/<?= $row_chitiet['sanpham_img'] ?> " alt="">
                    </div>
                </div>
                <div class="col-7 col-md-12">
                    <div class="product-info">
                        <h1>
                            <?= $row_chitiet['sanpham_name'] ?>
                        </h1>

                        <p class="product-description"><?= $row_chitiet['sanpham_mota'] ?></p>

                        <div class="product-info-price"><?php echo number_format($row_chitiet['sanpham_giakhuyenmai']) ?><sup>đ</sup></div>
                        <!-- <div class="product-quantity-wrapper">
                            <span class="product-quantity-btn">
                                <i class='bx bx-minus'></i>
                            </span>
                            <span class="product-quantity">1</span>
                            <span class="product-quantity-btn">
                                <i class='bx bx-plus'></i>
                            </span>
                        </div> -->
                        <div>
                            <form action="?quanly=giohang" method="POST">
                                <input type="hidden" name="tensanpham" value="<?= $row_chitiet['sanpham_name'] ?>">
                                <input type="hidden" name="sanpham_id" value="<?= $row_chitiet['sanpham_id'] ?>">
                                <input type="hidden" name="sanphamgia" value="<?= $row_chitiet['sanpham_giakhuyenmai'] ?>">
                                <input type="hidden" name="hinhanh" value="<?= $row_chitiet['sanpham_img'] ?>">
                                <input type="hidden" name="soluong" value="1">
                                <?php
                                if ($row_chitiet['sanpham_soluong'] == 0) {
                                    echo ' <input type="submit" name="themgiohang" disabled class="btn-flat btn-hover" value="Hết hàng">';
                                } else {
                                    echo '<input type="submit" name="themgiohang"  class="btn-flat btn-hover" value="Thêm giỏ hàng">';
                                }

                                ?>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box">
                <div class="box-header">
                    <?= $row_chitiet['sanpham_chitiet'] ?>
                </div>
            <?php
        }
            ?>
            </div>


            <div class="box">
                <div class="box-header">
                    Bình luận
                </div>
                <div>
                    <?php

                    $id_sanpham = $_GET['id'];
                    $sql_select_binhluan = mysqli_query($con, "SELECT * FROM binhluan,khachhang 
                where binhluan.khachhang_id=khachhang.khachhang_id AND trangthai = 1 AND sanpham_id = '$id_sanpham'
                    order by binhluan_id DESC limit 2");
                    while ($row_binhluan = mysqli_fetch_array($sql_select_binhluan)) {
                    ?>
                        <div class="user-rate" style="border-bottom: 1px solid #ccc;width:90%">
                            <div class="user-info">
                                <div class="user">
                                    <img src="upload/<?= $row_binhluan['khachhang_img'] ?>" alt="3213213">
                                </div>
                                <h5 style="margin-left: 1%;"><?= $row_binhluan['name'] ?></h5>
                            </div>
                            <div class="user-rate-content" style="margin-left: 4.8%; ">
                                <?= $row_binhluan['noidung'] ?>
                            </div>
                            <div class="user-rate-content" style="margin-left: 4.8%; ">
                                <?= $row_binhluan['ngaythang'] ?>
                            </div>

                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="box">
                <h2>Bình luận: </h2>
                <?php
                if (isset($_SESSION['dangnhap_home'])) {
                    echo '<form action="" method="POST">
                        <section>
                            <textarea name="noidung" id="" placeholder="Bình luận..."> </textarea>
                        </section>
                        <section>
                            <input type="submit" name="gui" class="btn-flat btn-hover" value="Gửi bình luận">
                        </section>
                    </form>';
                } else {
                    echo 'Bạn cần <a href="./include/login.php" style="color: orangered;">đăng nhập</a> để có thể bình luận';
                }
                ?>
            </div>

        </div>
    </div>
    <!-- end product-detail content -->
    <style>
        .box textarea {
            width: 50%;
            resize: none;
            height: 150px;

        }

        .user {
            position: relative;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            overflow: hidden;
            cursor: pointer;
        }

        .user img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;

        }
    </style>