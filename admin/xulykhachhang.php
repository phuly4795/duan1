<?php
include('../db/conn.php');
?>

<?php

// if(isset($_POST['capnhatdonhang'])){
//     $xuly = $_POST['xuly'];
//     $mahang = $_POST['mahang_xuly'];
//     $sql_update_donhang = mysqli_query($con,"UPDATE donhang SET tinhtrang = '$xuly' where mahang = '$mahang'");
// }
// if(isset($_GET['xoadonhang'])){
//     $mahang = $_GET['xoadonhang'];
//     $sql_delete = mysqli_query($con,"DELETE FROM donhang where mahang = '$mahang'");
//     header('Location:xulydonhang.php');
// }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khách hàng</title>
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
                    ?>
                    <div class="col-md-12">
                        <h4>Khách hàng</h4>

                        <?php
                        $sql_select_khachhang = mysqli_query($con, "SELECT * FROM khachhang order by khachhang_id ASC");
                        //    $sql_select_khachhang = mysqli_query($con,"SELECT * FROM khachhang,donhang                   các khách hàng đã mua hàng
                        //         where khachhang.khachhang_id = donhang.khachhang_id GROUP by khachhang.khachhang_id
                        //             order by khachhang.khachhang_id DESC");



                        ?>
                        <table class="table  table-bordered ">
                            <tr>
                                <th>Thứ tự</th>
                                <th>Tên khách hàng</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th>email</th>
                                <th>Số lượng đơn đã đặt</th>
                                <th>Tỉ lệ đơn thành công</th>
                            </tr>
                            <?php
                            $i = 0;
                            while ($row_khachhang = mysqli_fetch_array($sql_select_khachhang)) {
                                $i++;
                                
                                $kh_id = $row_khachhang['khachhang_id'];

                                $sql_sld = mysqli_query($con, "SELECT khachhang_id,count(donhang_id) as sld FROM donhang
                                    where khachhang_id ='$kh_id' order by khachhang_id");

                                $sql_sldtc = mysqli_query($con, "SELECT count(donhang_id) as sldtc FROM donhang
                                    where khachhang_id = '$kh_id' and tinhtrang = 3 order by donhang_id");                             
                                $row_sld = mysqli_fetch_array($sql_sld);
                                $row_sldtc = mysqli_fetch_array($sql_sldtc);
                              
                                $tile = -1;
                                if ($row_sld['sld'] != 0) {

                                    $tile = ($row_sldtc['sldtc'] / $row_sld['sld']) * 100;
                                }
                                
                                $sql_select_khachhang_donhang = mysqli_query($con, "SELECT donhang_id from donhang where khachhang_id ='$kh_id' ");
                                
                                $row_kh_dh = mysqli_fetch_array($sql_select_khachhang_donhang);
                              
                            ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $row_khachhang['name'] ?></td>
                                    <td><?= $row_khachhang['phone'] ?></td>
                                    <td><?= $row_khachhang['address'] ?></td>
                                    <td><?= $row_khachhang['email'] ?></td>
                                    <td><?php
                                        if ($row_kh_dh['donhang_id'] == null) {
                                            echo 'chưa mua hàng';
                                            
                                        } else {
                                            echo $row_sld['sld'];
                                        }
                                        ?></td>
                                    <td><?php
                                        if ($tile == -1) {
                                            echo 'chưa mua hàng';
                                        } else {
                                            echo $tile . '%';
                                        }
                                        ?></td>
                                       
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