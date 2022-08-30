<?php
include('../db/conn.php');
?>

<?php

if (isset($_POST['capnhatdonhang'])) {
    $xuly = $_POST['xuly'];
    $mahang = $_POST['mahang_xuly'];
    $sql_update_donhang = mysqli_query($con, "UPDATE donhang SET tinhtrang = '$xuly' where donhang_id = '$mahang'");
}
if (isset($_GET['xoadonhang'])) {
    $mahang = $_GET['xoadonhang'];
    $sql_delete_ct = mysqli_query($con, "DELETE FROM chitiet_donhang where donhang_id = '$mahang'");
    $sql_delete_dh = mysqli_query($con, "DELETE FROM donhang where donhang_id = '$mahang'");
    header('Location:xulydonhang.php');
}
if (isset($_GET['xacnhanhuy']) && isset($_GET['mahang'])) {
    $huydon = $_GET['xacnhanhuy'];
    $magiaodich = $_GET['mahang'];
} else {
    $huydon = '';
    $magiaodich = '';
}
$sql_update_donhang = mysqli_query($con, "UPDATE donhang SET huydon = '$huydon' where donhang_id = '$magiaodich'");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn hàng</title>
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
                    if (isset($_GET['quanly']) == 'xemdonhang') {
                        $mahang = $_GET['mahang'];

                        $sql_chitiet = mysqli_query($con, "SELECT * FROM sanpham,chitiet_donhang,donhang
                            where chitiet_donhang.sanpham_id=sanpham.sanpham_id
                                AND donhang.donhang_id=chitiet_donhang.donhang_id
                                    AND donhang.donhang_id = '$mahang'");

                    ?>
                        <h4>Xem chi tiết đơn hàng</h4>
                        <div class="col-md-10">
                            <form action="" method="post">
                                <table class="table  table-bordered ">
                                    <tr>
                                        <th>Thứ tự</th>
                                        <th>Mã hàng</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Đơn giá</th>
                                        <th>Tổng tiền</th>
                                        <th>Ngày đặt</th>
                                    </tr>
                                    <?php
                                    $i = 0;
                                    $total = 0;
                                    while ($row_donhang = mysqli_fetch_array($sql_chitiet)) {
                                        $i++;

                                        $tt = $row_donhang['tongthanhtoan'];
                                        $subtotal = $row_donhang['soluong'] * $row_donhang['sanpham_giakhuyenmai'];
                                      
                                    ?>
                                        <tr>
                                            <td><?= $i ?></td>
                                            <td><?= $row_donhang['donhang_id'] ?></td>
                                            <td><?= $row_donhang['sanpham_name'] ?></td>
                                            <td><?= $row_donhang['soluong'] ?></td>
                                            <td><?php echo number_format($row_donhang['sanpham_giakhuyenmai']) ?><sup>đ</sup></td>
                                            <td><?php echo  number_format($subtotal)  ?><sup>đ</sup></td>
                                            <td><?= $row_donhang['ngaythang'] ?></td>
                                            <input type="hidden" name="mahang_xuly" value="<?php echo $row_donhang['donhang_id'] ?>">

                                        </tr>


                                        <tr>
                                     
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                  <td colspan="7" style="text-align: center;">
                                            <span>Tổng tiền:</span>
                                            <span style="font-size: 22px; font-weight:700"><?php echo  number_format($tt) ?><sup>đ</sup></span>
                                        </td>
                                </table>

                                <select class="form-control" name="xuly" id="">
                                    <option value="0">Chưa xử lý</option>
                                    <option value="1">Đã xử lý</option>
                                    <option value="2">Đang giao hàng</option>
                                    <option value="3">Giao hàng thành công</option>
                                </select><br>
                                <input type="submit" value="Cập nhật đơn hàng" name="capnhatdonhang" class="btn btn-success">
                            </form><br>
                        </div>
                    <?php
                    } else { ?>

                    <?php
                    }
                    ?>

                    <div class="col-md-10">
                        <h4>Liệt kê đơn hàng</h4>

                        <?php
                        $sql_select = mysqli_query($con, "SELECT * FROM sanpham,khachhang,donhang,chitiet_donhang
                                where chitiet_donhang.sanpham_id=sanpham.sanpham_id 
                                    AND donhang.khachhang_id=khachhang.khachhang_id
                                        AND donhang.donhang_id=chitiet_donhang.donhang_id
                                            GROUP BY  chitiet_donhang.donhang_id order by donhang.donhang_id DESC");
                        ?>
                        <table class="table  table-bordered ">
                            <tr>
                                <th>Thứ tự</th>
                                <th>Tên khách hàng</th>
                                <th>Mã đơn hàng</th>
                                <th>Ngày đặt</th>
                                <th>Tình trạng đơn hàng</th>
                                <th>Hủy đơn</th>
                                <th>Thao tác</th>
                            </tr>
                            <?php
                            $i = 0;
                            while ($row_donhang = mysqli_fetch_array($sql_select)) {
                                $i++;
                            ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $row_donhang['name'] ?></td>
                                    <td><?= $row_donhang['donhang_id'] ?></td>
                                    <td><?= $row_donhang['ngaythang'] ?></td>
                                    <td><?php
                                        if ($row_donhang['tinhtrang'] == 0) {
                                            echo 'Chưa xử lý';
                                        } elseif ($row_donhang['tinhtrang'] == 1) {
                                            echo 'Đã xử lý';
                                        } elseif ($row_donhang['tinhtrang'] == 2) {
                                            echo 'Đang giao hàng';
                                        } else {
                                            echo 'Giao hàng thành công';
                                        }
                                        ?></td>
                                    <td>
                                        <?php
                                        if ($row_donhang['huydon'] == 0) {
                                        } elseif ($row_donhang['huydon'] == 1) {
                                            echo '<a href="xulydonhang.php?quanly=xemdonhang&mahang=' . $row_donhang['donhang_id'] . '&xacnhanhuy=2">Xác nhận hủy đơn</a>';
                                        } else {
                                            echo 'đã hủy';
                                        }
                                        ?>
                                    </td>
                                   
                                    <td><a href="?xoadonhang=<?php echo $row_donhang['donhang_id'] ?>" onclick="return confirm('bạn có chắc muốn xóa đơn hàng này không')">Xóa</a>
                                        || <a href="?quanly=xemdonhang&mahang=<?php echo $row_donhang['donhang_id'] ?>">Chi tiết</a>
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
    </script>


</body>

</html>