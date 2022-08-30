<?php
include('../db/conn.php');
?>

<?php
if (isset($_POST['themsanpham'])) {
    $tensanpham = $_POST['tensanpham'];
    $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    $soluong = $_POST['soluong'];
    $sph = $_POST['sph'];
    $gia = $_POST['giasanpham'];
    $giakhuyenmai = $_POST['giakhuyenmai'];
    $danhmuc = $_POST['danhmuc'];
    $ncc = $_POST['ncc'];
    $chitiet = $_POST['chitiet'];
    $mota = $_POST['mota'];
    $path = '../upload/';

    $sql_insert_product = mysqli_query($con, "INSERT INTO sanpham(sanpham_name, sanpham_chitiet, sanpham_mota, sanpham_gia, sanpham_giakhuyenmai,sanpham_hot, sanpham_soluong, sanpham_img,category_id,nhacungcap_id)
             VALUES ('$tensanpham','$chitiet','$mota','$gia','$giakhuyenmai','$sph','$soluong','$hinhanh','$danhmuc','$ncc')");

    move_uploaded_file($hinhanh_tmp, $path . $hinhanh);
} elseif (isset($_POST['capnhatsanpham'])) {
    $id_update = $_POST['id_update'];
    $tensanpham = $_POST['tensanpham'];
    $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
    $soluong = $_POST['soluong'];
    $tt = $_POST['tt'];
    $sph = $_POST['sph'];
    $gia = $_POST['giasanpham'];
    $giakhuyenmai = $_POST['giakhuyenmai'];
    $danhmuc = $_POST['danhmuc'];
    $ncc = $_POST['ncc'];
    $chitiet = $_POST['chitiet'];
    $mota = $_POST['mota'];
    $path = '../upload/';

    if ($hinhanh == '') {
        $sql_update_img = "UPDATE sanpham SET sanpham_name = '$tensanpham', sanpham_chitiet = '$chitiet',
                sanpham_mota = '$mota', sanpham_gia = '$gia', sanpham_giakhuyenmai = '$giakhuyenmai', sanpham_active = '$tt', sanpham_hot = '$sph',
                    sanpham_soluong = '$soluong', category_id = '$danhmuc', nhacungcap_id = '$ncc'
                        where sanpham_id = '$id_update'";
    } else {
        move_uploaded_file($hinhanh_tmp, $path . $hinhanh);
        $sql_update_img =  "UPDATE sanpham SET sanpham_name = '$tensanpham', sanpham_chitiet = '$chitiet',
                sanpham_mota = '$mota', sanpham_gia = '$gia', sanpham_giakhuyenmai = '$giakhuyenmai', sanpham_active = '$tt', sanpham_hot = '$sph',
                    sanpham_soluong = '$soluong', sanpham_img = '$hinhanh', category_id = '$danhmuc', nhacungcap_id = '$ncc'
                        where sanpham_id = '$id_update'";
    }
    mysqli_query($con, $sql_update_img);
}
if (isset($_GET['xoa'])) {
    $id = $_GET['xoa'];
    $sql_xoa = mysqli_query($con, "DELETE FROM sanpham where sanpham_id = '$id'");
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản phẩm</title>
    <link rel="stylesheet" href="../css/style_admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body>
    <div class="container1">
        <?php
        include('menu.php');
        ?>
        <!-- main -->
        <div class="main">
            <div class="toggle">
                <ion-icon name="menu-outline"></ion-icon>
            </div>
            <div class="container">
                <div class="row">

                    <?php
                    if (isset($_GET['quanly']) == 'capnhat') {

                        $id_capnhat = $_GET['capnhat_id'];
                        $sql_capnhat = mysqli_query($con, "SELECT * FROM sanpham where sanpham_id = '$id_capnhat'");
                        $row_capnhat = mysqli_fetch_array($sql_capnhat);
                        $id_category_1 = $row_capnhat['category_id'];
                        $id_ncc = $row_capnhat['nhacungcap_id'];
                    ?>
                        <div class="col-md-4">
                            <h4>Cập nhật sản phẩm</h4>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <label for="">Tên sản phẩm</label>
                                <input type="text" class="form-control" name="tensanpham" value="<?= $row_capnhat['sanpham_name'] ?>"><br>
                                <input type="hidden" class="form-control" name="id_update" value="<?= $row_capnhat['sanpham_id'] ?>"><br>
                                <label for="">Hình sản phẩm</label>
                                <input type="file" class="form-control" name="hinhanh"><br>
                                <img src="../upload/<?= $row_capnhat['sanpham_img'] ?>" alt="" height="80" width="80"><br>
                                <label for="">Giá sản phẩm</label>
                                <input type="text" class="form-control" name="giasanpham" value="<?= $row_capnhat['sanpham_gia'] ?>"><br>
                                <label for="">Giá khuyến mãi</label>
                                <input type="text" class="form-control" name="giakhuyenmai" value="<?= $row_capnhat['sanpham_giakhuyenmai'] ?>"><br>
                                <label for="">Số lượng</label>
                                <input type="text" class="form-control" name="soluong" value="<?= $row_capnhat['sanpham_soluong'] ?>"><br>
                                <label for="">Tình trạng</label><br>
                                <?php
                                if ($row_capnhat['sanpham_soluong'] == 0) {
                                    echo ' <input type="radio" name="tt" id="" value="0"  >Còn hàng';
                                    echo '  <input type="radio" name="tt" id="" value="1" checked >Hết hàng <br><br>';
                                } else {
                                    echo '  <input type="radio" name="tt" id="" value="0" checked>Còn hàng';
                                    echo '  <input type="radio" name="tt" id=""  value="1"  >Hết hàng <br><br>';
                                }
                                ?>
                                <label for="">Sản phẩm hot</label><br>
                                <?php
                                if ($row_capnhat['sanpham_hot'] == 0) {
                                    echo ' <input type="radio" name="sph" id="" value="0" checked>Sản phẩm thường';
                                    echo ' <input type="radio" name="sph" id="" value="1">Sản phẩm hot<br><br>';
                                } else {
                                    echo ' <input type="radio" name="sph" id="" value="0" >Sản phẩm thường';
                                    echo ' <input type="radio" name="sph" id="" value="1" checked>Sản phẩm hot<br><br>';
                                }
                                ?>
                                <label for="">Mô tả sản phẩm</label>
                                <textarea class="form-control" name="mota" id="ckeditor1" cols="30" rows="10">
                                <?= $row_capnhat['sanpham_mota'] ?>
                            </textarea><Br>
                                <label for="">Chi tiết sản phẩm</label>
                                <textarea class="form-control" name="chitiet" id="ckeditor" cols="30" rows="10">
                                <?= $row_capnhat['sanpham_chitiet'] ?>
                            </textarea><br>
                                <label for="">Danh mục sản phẩm</label>
                                <?php
                                $sql_danhmuc = mysqli_query($con, "SELECT * FROM category order by category_id DESC");

                                ?>
                                <select name="danhmuc" id="" class="form-control">
                                    <option value="0">----Chọn danh mục----</option>
                                    <?php
                                    while ($row_danhmuc = mysqli_fetch_array($sql_danhmuc)) {
                                        if ($id_category_1 == $row_danhmuc['category_id']) {
                                    ?>
                                            <option selected value="<?= $row_danhmuc['category_id'] ?>"><?= $row_danhmuc['category_name'] ?></option>
                                        <?php
                                        } else {
                                        ?>
                                            <option value="<?= $row_danhmuc['category_id'] ?>"><?= $row_danhmuc['category_name'] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select><br>

                                <label for="">Nhà cung cấp sản phẩm</label>
                                <?php
                                $sql_ncc = mysqli_query($con, "SELECT * FROM nhacungcap order by nhacungcap_id DESC");

                                ?>
                                <select name="ncc" id="" class="form-control">
                                    <option value="0">----Chọn Nhà cung cấp----</option>
                                    <?php
                                    while ($row_ncc = mysqli_fetch_array($sql_ncc)) {
                                        if ($id_ncc == $row_ncc['nhacungcap_id']) {
                                    ?>
                                            <option selected value="<?= $row_ncc['nhacungcap_id'] ?>"><?= $row_ncc['tennhacungcap'] ?></option>
                                        <?php
                                        } else {
                                        ?>
                                            <option value="<?= $row_ncc['nhacungcap_id'] ?>"><?= $row_ncc['tennhacungcap'] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select><br>
                                <input type="submit" name="capnhatsanpham" value="Cập nhật sản phẩm" class="btn btn-success">
                            </form>
                        </div>
                    <?php
                    } else { ?>
                        <div class="col-md-4">
                            <h4>Thêm Sản phẩm</h4>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <label for="">Tên sản phẩm</label>
                                <input type="text" class="form-control" name="tensanpham" placeholder="Tên sản phẩm"><br>
                                <label for="">Hình sản phẩm</label>
                                <input type="file" class="form-control" name="hinhanh"><br>
                                <label for="">Giá sản phẩm</label>
                                <input type="text" class="form-control" name="giasanpham" placeholder="Giá sản phẩm"><br>
                                <label for="">Giá khuyến mãi</label>
                                <input type="text" class="form-control" name="giakhuyenmai" placeholder="Giá khuyến mãi"><br>
                                <label for="">Số lượng</label>
                                <input type="text" class="form-control" name="soluong" placeholder="Số lượng sản phẩm"><br>
                                <label for="">Sản phẩm hot</label><br>
                                <input type="radio" name="sph" id="" value="0" checked>Sản phẩm thường
                                <input type="radio" name="sph" id="" value="1">Sản phẩm hot<br><br>
                                <label for="">Mô tả sản phẩm</label>
                                <textarea class="form-control" name="mota" id="ckeditor1" cols="30" rows="10"></textarea><Br>
                                <label for="">Chi tiết sản phẩm</label>
                                <textarea class="form-control" name="chitiet" id="ckeditor" cols="30" rows="10"></textarea><br>
                                <label for="">Danh mục sản phẩm</label>
                                <?php
                                $sql_danhmuc = mysqli_query($con, "SELECT * FROM category order by category_id DESC");

                                ?>
                                <select name="danhmuc" id="" class="form-control">
                                    <option value="0">----Chọn danh mục----</option>
                                    <?php
                                    while ($row_danhmuc = mysqli_fetch_array($sql_danhmuc)) {
                                    ?>
                                        <option value="<?= $row_danhmuc['category_id'] ?>"><?= $row_danhmuc['category_name'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select><br>

                                <label for="">Nhà cung cấp sản phẩm</label>
                                <?php
                                $sql_ncc = mysqli_query($con, "SELECT * FROM nhacungcap order by nhacungcap_id DESC");

                                ?>
                                <select name="ncc" id="" class="form-control">
                                    <option value="0">----Chọn Nhà cung cấp----</option>
                                    <?php
                                    while ($row_ncc = mysqli_fetch_array($sql_ncc)) {
                                    ?>
                                        <option value="<?= $row_ncc['nhacungcap_id'] ?>"><?= $row_ncc['tennhacungcap'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select><br>
                                <input type="submit" name="themsanpham" value="Thêm danh mục" class="btn btn-success">
                            </form>
                        </div>
                    <?php
                    }
                    ?>

                    <div class="col-md-8">
                        <h4>Liệt kê sản phẩm</h4>

                        <?php
                        $sql_select_sp = mysqli_query($con, "SELECT * FROM sanpham,category where sanpham.category_id = category.category_id
                                order by sanpham.sanpham_id DESC");

                        ?>
                        <table class="table  table-bordered ">
                            <tr>
                                <th>Thứ tự</th>
                                <th>Tên sản phẩm</th>
                                <th>Hình ảnh</th>
                                <th>Số lượng</th>
                                <th>Danh mục</th>
                                <th>Giá sản phẩm</th>
                                <th>Giá khuyến mãi</th>
                                <th>Thao tác</th>
                            </tr>
                            <?php
                            $i = 0;
                            while ($row_sanpham = mysqli_fetch_array($sql_select_sp)) {
                                $i++;
                            ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $row_sanpham['sanpham_name'] ?></td>
                                    <td><img src="../upload/<?= $row_sanpham['sanpham_img'] ?>" alt="" height="80" width="80"></td>
                                    <td><?= $row_sanpham['sanpham_soluong'] ?></td>
                                    <td><?= $row_sanpham['category_name'] ?></td>
                                    <td><?php echo number_format($row_sanpham['sanpham_gia']) ?><sup>đ</sup></td>
                                    <td><?php echo number_format($row_sanpham['sanpham_giakhuyenmai']) ?><sup>đ</sup></td>
                                    <td><a href="?xoa=<?php echo $row_sanpham['sanpham_id'] ?>">Xóa</a>
                                        || <a href="xulysanpham.php?quanly=capnhat&capnhat_id=<?php echo $row_sanpham['sanpham_id'] ?>">Cập nhật</a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>

        </div>


    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="//cdn.ckeditor.com/4.17.1/full/ckeditor.js"></script>
    <script>
        // đóng mở menu
        let toggle = document.querySelector('.toggle');
        let nav = document.querySelector('.nav');
        let main = document.querySelector('.main');

        toggle.onclick = function() {
            nav.classList.toggle('active');
            main.classList.toggle('active')
        }

        // thêm cái class hovered vào list item
        let list = document.querySelectorAll('.nav li');

        function activeLink() {
            list.forEach((item) =>
                item.classList.remove('hovered'));
            this.classList.add('hovered')
        }
        list.forEach((item) =>
            item.addEventListener('mouseover', activeLink))

        CKEDITOR.replace('ckeditor');
        CKEDITOR.replace('ckeditor1');
    </script>


</body>

</html>