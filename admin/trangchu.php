<?php
session_start();
include_once('../db/conn.php');
if (!isset($_SESSION['dangnhap'])) {
    header('Location: index.php');
}
if (isset($_GET['login'])) {
    $dangxuat = $_GET['login'];
} else {
    $dangxuat = '';
}
if ($dangxuat == 'dangxuat') {
    unset($_SESSION['dangnhap']);
    header('Location: ../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../css/style_admin.css">
</head>

<body>
    <div class="container">
        <?php
        include('menu.php');
        ?>
        <!-- main -->
        <div class="main">
            <div class="topbar">
                <div class="toggle">
                    <ion-icon name="menu-outline"></ion-icon>
                </div>
                <!-- serch -->
                <div class="search">
                    <label for="">
                        <input type="text" placeholder="Search here">
                        <ion-icon name="search-outline"></ion-icon>
                    </label>
                </div>
                <!-- user img -->
                <div class="user">
                    <h5>Xin chào: <?php echo $_SESSION['dangnhap'] ?> </h5>

                </div>
            </div>
            <!-- cads -->
            <div class="cardBox">
                <div class="card">
                    <?php
                    $sql_kh = mysqli_query($con, "SELECT count(khachhang_id) as kh FROM khachhang order by khachhang_id DESC");
                    $row_kh = mysqli_fetch_array($sql_kh);
                    ?>
                    <div>
                        <div class="numbers"><?= $row_kh['kh'] ?></div>
                        <div class="cardName"> Khách hàng</div>
                    </div>
                    <div class="iconbox">
                        <a href="xulykhachhang.php">
                            <ion-icon name="person-outline"></ion-icon>
                        </a>
                    </div>

                </div>
                <div class="card">
                    <?php
                    $sql_dh = mysqli_query($con, "SELECT count(donhang_id) as dh FROM donhang  order by donhang_id DESC");
                    $row_dh = mysqli_fetch_array($sql_dh);
                    ?>
                    <div>
                        <div class="numbers"><?= $row_dh['dh'] ?></div>
                        <div class="cardName">Đơn hàng</div>
                    </div>
                    <div class="iconbox">
                        <a href="xulydonhang.php">
                            <ion-icon name="cart-outline"></ion-icon>
                        </a>
                    </div>
                </div>
                <div class="card">
                    <?php
                    $sql_bl = mysqli_query($con, "SELECT count(binhluan_id) as bl FROM binhluan  order by binhluan_id DESC");
                    $row_bl = mysqli_fetch_array($sql_bl);
                    ?>
                    <div>
                        <div class="numbers"><?= $row_bl['bl'] ?></div>
                        <div class="cardName">Bình luận</div>
                    </div>
                    <div class="iconbox">
                        <a href="xulybinhluan.php">
                            <ion-icon name="reader-outline"></ion-icon>
                        </a>
                    </div>
                </div>
                <div class="card">
                    <?php
                    $sql_sp = mysqli_query($con, "SELECT count(sanpham_id) as sp FROM sanpham  order by sanpham_id DESC");
                    $row_sp = mysqli_fetch_array($sql_sp);
                    ?>
                    <div>
                        <div class="numbers"><?= $row_sp['sp'] ?></div>
                        <div class="cardName">Sản phẩm</div>
                    </div>
                    <div class="iconbox">
                        <a href="xulysanpham.php">
                            <ion-icon name="layers-outline"></ion-icon>
                        </a>
                    </div>
                </div>
            </div>
            <!-- đơn hàng -->
            <div class="details">
                <!-- Danh sách đơn hàng -->
                <div class="recentOrder">
                    <div class="cardHeader">
                        <h2>Đơn hàng</h2>
                        <a href="xulydonhang.php" class="btn">Xem tất cả</a>
                    </div>
                    <?php
                    $sql_select = mysqli_query($con, "SELECT * FROM sanpham,khachhang,donhang,chitiet_donhang
                        where chitiet_donhang.sanpham_id=sanpham.sanpham_id 
                            AND donhang.khachhang_id=khachhang.khachhang_id
                                AND donhang.donhang_id=chitiet_donhang.donhang_id
                                    GROUP BY  chitiet_donhang.donhang_id order by donhang.donhang_id DESC limit 10");
                    ?>
                    <table>
                        <thead>
                            <tr>
                                <td>Tên khách hàng</td>
                                <td>Tổng thanh toán</td>
                                <td>Mã đơn hàng</td>
                                <td>Trạng thái</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row_donhang = mysqli_fetch_array($sql_select)) {

                            ?>
                                <tr>
                                    <td><?= $row_donhang['name'] ?></td>
                                    <td><?php echo number_format($row_donhang['tongthanhtoan']) ?><sup>đ</sup></td>
                                    <td><?= $row_donhang['donhang_id'] ?></td>

                                    <?php
                                    if ($row_donhang['tinhtrang'] == 0) {
                                        echo '<td><span class="status pending">Chưa xử lý</span></td>';
                                    } elseif ($row_donhang['tinhtrang'] == 1) {
                                        echo '<td><span class="status pending">Đã xử lý</span></td>';
                                    } elseif ($row_donhang['tinhtrang'] == 2) {
                                        echo '<td><span class="status inprogress">Đang vận chuyển</span></td>';
                                    } elseif ($row_donhang['huydon'] == 2) {
                                        echo '<td><span class="status return">hủy đơn</span></td>';
                                    } else {
                                        echo '<td><span class="status delivered ">Giao hàng thành công</span></td>';
                                    }
                                    ?>

                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!-- Khách hàng mới -->
                <div class="recentCustomers">
                    <div class="cardHeader">
                        <h2>Khách hàng</h2>
                        <a href="xulykhachhang.php" class="btn">Xem tất cả</a>
                    </div>
                    <?php
                    $sql_kh_new = mysqli_query($con, "SELECT * FROM khachhang order by khachhang_id DESC");
                    while ($row_kh_new = mysqli_fetch_array($sql_kh_new)) {
                    ?>
                        <table>
                            <tr>
                                <td width="60px">
                                    <div class="imgbox"><img src="../upload/<?= $row_kh_new['khachhang_img'] ?>" alt=""></div>
                                </td>
                                <td>
                                    <h4><?= $row_kh_new['name'] ?><br><span><?= $row_kh_new['address'] ?></span></h4>
                                </td>
                            </tr>
                        </table>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>


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