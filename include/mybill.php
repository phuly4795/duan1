<?php
if (isset($_GET['huydon']) && isset($_GET['magiaodich'])) {
    $huydon = $_GET['huydon'];
    $magiaodich = $_GET['magiaodich'];
} else {
    $huydon = '';
    $magiaodich = '';
}
$sql_update_donhang = mysqli_query($con, "UPDATE donhang SET huydon = '$huydon' where donhang_id = '$magiaodich'");


if (isset($_GET['trahang']) && isset($_GET['magiaodich'])) {
    $trahang = $_GET['trahang'];
    $magiaodich = $_GET['magiaodich'];
} else {
    $trahang = '';
    $magiaodich = '';
}
$sql_update_donhang = mysqli_query($con, "UPDATE donhang SET tinhtrang = '$trahang' where donhang_id = '$magiaodich'");

?>

<div class="section-header">
    <h2>Đơn hàng của tôi </h2>
</div>
<section id="cart-container" class="container my-5" style="margin-bottom: 5%;">
    <?php
    if (isset($_GET['id_khachhang'])) {
        $id_khachhang = $_GET['id_khachhang'];
    } else {
        $id_khachhang = '';
    }
    $sql_select_mybill = mysqli_query($con, "SELECT * FROM donhang where khachhang_id = '$id_khachhang' 
                            GROUP BY donhang_id DESC");
    ?>
    <table width="100%">
        <thead>
            <tr>
                <td>Thứ tự</td>
                <td>Mã đơn hàng</td>
                <td>Ngày đặt</td>
                <td>Tình trạng</td>
                <td>Yêu cầu</td>
                <td>Xem đơn hàng</td>
            </tr>
        </thead>
        <?php
        $i = 0;
        while ($row_donhang = mysqli_fetch_array($sql_select_mybill)) {
            $i++;
        ?>
            <tbody>
                <tr>
                    <td><?php echo $i ?></td>
                    <td><?php echo $row_donhang['donhang_id'] ?></td>
                    <td><?php echo $row_donhang['ngaythang'] ?></td>
                    <td><?php
                        if ($row_donhang['tinhtrang'] == 0) {
                            echo 'Đang chờ xử lý';
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
                        if($row_donhang['tinhtrang'] == 3 || $row_donhang['tinhtrang'] == 2 ){
                        ?>
                        <p style="color: #ccc;">Hủy đơn</p>

                        <?php
                        }else{


                        if ($row_donhang['huydon'] == 0) {
                        ?>
                            <a href="index.php?quanly=mybill&id_khachhang=<?= $_SESSION['khachhang_id'] ?>&magiaodich=<?= $row_donhang['donhang_id'] ?>&huydon=1">Hủy đơn</a>
                        <?php
                        } elseif ($row_donhang['huydon'] == 1) {
                        ?>
                            <p>Đang chờ xác nhận</p>
                        <?php
                        } else {
                            echo '<span style="color: orangered;">đã hủy</span>';
                        }}
                        ?>

                    </td>
                    <td><a href="index.php?quanly=mybill&id_khachhang=<?php echo $_SESSION['khachhang_id'] ?>&magiaodich=<?php echo $row_donhang['donhang_id'] ?>">Xem chi tiết</a></td>
                </tr>
            </tbody>
        <?php
        }
        ?>
    </table>
</section>
<section id="cart-container" class="container my-5" style="margin-bottom: 5%;">
    <h4>Chi tiết đơn hàng </h4>


    <?php
    if (isset($_GET['magiaodich'])) {
        $magiaodich = $_GET['magiaodich'];
    } else {
        $magiaodich = '';
    }
    $sql_select = mysqli_query($con, "SELECT * FROM khachhang,donhang,sanpham,chitiet_donhang
                                where chitiet_donhang.sanpham_id=sanpham.sanpham_id 
                                    AND chitiet_donhang.donhang_id = donhang.donhang_id
                                        AND khachhang.khachhang_id = donhang.khachhang_id
                                            AND  donhang.donhang_id='$magiaodich'  order by chitiet_donhang.donhang_id DESC");
    ?>
    <table width="100%">
        <thead>
            <tr>
                <td>Thứ tự</td>
                <td>Mã đơn hàng</td>
                <td>Tên sản phẩm</td>
                <td>Số lượng</td>
                <td>Ngày đặt</td>

            </tr>
        </thead>

        <?php
        $i = 0;
        while ($row_donhang = mysqli_fetch_array($sql_select)) {
            $i++;
        ?>
            <tbody>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $row_donhang['donhang_id'] ?></td>
                    <td><?= $row_donhang['sanpham_name'] ?></td>
                    <td><?= $row_donhang['soluong'] ?></td>
                    <td><?= $row_donhang['ngaythang'] ?></td>

                </tr>
            </tbody>
        <?php
        }
        ?>
    </table>
</section>


<style>
    /* cart */
    .btn-flat {
        margin-left: 2%;
        width: 37%;
        margin-top: 2%;
        margin-bottom: 1.2%;
        padding: 10px 35px;
        font-size: 23px;
    }

    .gg {
        width: 44%;
        border: 1px solid;
        float: left;
        margin-left: 1%;
    }

    .gg input {
        margin-left: 15%;
        margin-top: 5%;
    }

    .total {
        width: 50%;
        border: 1px solid;
        margin-left: 5%;
    }


    .tt span {
        color: #c0392b;
        font-size: 27px;
    }

    #cart-container {
        overflow-y: auto;
    }

    #cart-container table {
        border-collapse: collapse;
        width: 100%;
        table-layout: fixed;
        white-space: nowrap;
    }

    #cart-container table thead {
        font-weight: 700;
    }

    #cart-container table thead td {
        background-color: #fd8c66;
        color: #fff;
        border: none;
        padding: 6px 0;
    }

    #cart-container table td {
        border: 1px solid #b6b3b3;
        text-align: center;
    }

    #cart-container table td:nth-child(1) {
        width: 100px;
        font-size: 25px;
        font-weight: 700;
    }

    #cart-container table td:nth-child(2),
    #cart-container table td:nth-child(3) {
        width: 200px;
    }

    #cart-container table td:nth-child(4),
    #cart-container table td:nth-child(5),
    #cart-container table td:nth-child(6),
    #cart-container table td:nth-child(7) {
        width: 200px;
    }

    #cart-container table tbody img {
        width: 100px;
        height: 80px;
        object-fit: cover;
    }

    #cart-container table tbody i {
        color: #8d8c89;
    }

    #cart-bottom .gg h5,
    #cart-bottom .total h5 {
        background-color: #fd8c66;
        color: #fff;
        border: none;
        padding: 6px 12px;
        font-weight: 700;
        font-size: 19px;
    }

    #cart-bottom .total .d-fex h6 {
        float: left;
        margin-left: 2%;
        font-size: 16px;
    }

    #cart-bottom .total .d-fex p {
        text-align: right;
        margin-right: 2%;
    }

    #cart-bottom .total .d-fex2 h6 {
        float: left;
        margin-left: 2%;
        font-size: 16px;
    }

    #cart-bottom .total .d-fex2 p {
        float: right;
        margin-right: 2%;
    }

    #cart-bottom .gg p,
    #cart-bottom .gg input {
        padding: 0 12px;
    }

    #cart-bottom .gg input {
        height: 55px;
    }

    #cart-bottom .gg input,
    #cart-bottom .gg button {
        margin: 0 0 20px 12px;
    }

    #cart-bottom .total div>div {
        padding: 0 12px;
    }

    .second-hr {
        background-color: #b8b7b3;
        width: 100%;
        height: 1px;
    }

    #cart-bottom .total div>button {
        margin: 0 12px 20px 0;
        display: flex;
        justify-content: flex-end;
    }
</style>