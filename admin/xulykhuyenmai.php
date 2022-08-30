<?php
include('../db/conn.php');
?>

<?php
if (isset($_POST['themmagiamgia'])) {

    $tenmagiamgia = $_POST['tenmagiamgia'];
    $magiamgia = $_POST['magiamgia'];
    $ngaybatdau = $_POST['ngaybatdau'];
    $ngayketthuc = $_POST['ngayketthuc'];
    $tinhnangma = $_POST['tinhnangma'];
    $giagiam = $_POST['giagiam'];

    $sql_insert_magiamgia = mysqli_query($con, "INSERT INTO khuyenmai(makhuyenmai, tenmagiamgia, ngaybatdau, ngayketthuc, hinhthuckhuyenmai, giagiam)
             VALUES ('$magiamgia','$tenmagiamgia','$ngaybatdau','$ngayketthuc','$tinhnangma','$giagiam')");
} elseif (isset($_POST['capnhatkhuyenmai'])) {

    $id_update = $_POST['id_update'];
    
    $tenmagiamgia = $_POST['tenmagiamgia'];
    $magiamgia = $_POST['magiamgia'];
    $ngaybatdau = $_POST['ngaybatdau'];
    $ngayketthuc = $_POST['ngayketthuc'];
    $tinhnangma = $_POST['tinhnangma'];
    $giagiam = $_POST['giagiam'];
    
    
    $sql_update_khuyenmai = mysqli_query($con,"UPDATE khuyenmai  SET makhuyenmai = '$magiamgia', tenmagiamgia = '$tenmagiamgia',
         ngaybatdau = '$ngaybatdau', ngayketthuc = '$ngayketthuc', hinhthuckhuyenmai = '$tinhnangma', giagiam = '$giagiam'  
            where makhuyenmai = '$id_update'");
}


if (isset($_GET['xoa'])) {
    $id = $_GET['xoa'];
    $sql_xoa = mysqli_query($con, "DELETE FROM khuyenmai where makhuyenmai = '$id'");
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khuyến mãi</title>
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

                        $sql_capnhat = mysqli_query($con, "SELECT * FROM khuyenmai where makhuyenmai = '$id_capnhat'");

                        $row_capnhat = mysqli_fetch_array($sql_capnhat);
                   
                      
                    ?>
                        <div class="col-md-4">
                            <h4>Cập nhật khuyến mãi</h4>
                            <form action="" method="POST">
                                <label for="">Tên mã giảm giá</label>
                                <input type="text" class="form-control" name="tenmagiamgia" value="<?=$row_capnhat['tenmagiamgia']?>"><br>

                                <label for="">Mã giảm giá</label>
                                <input type="text" class="form-control" name="magiamgia" value="<?=$row_capnhat['makhuyenmai']?>"><br>

                                <input type="hidden" class="form-control" name="id_update" value="<?=$row_capnhat['makhuyenmai']?>">  

                                <label for="">Ngày bắt đầu</label>
                                <input type="date" class="form-control" name="ngaybatdau" value="<?=$row_capnhat['ngaybatdau']?>"><br>

                                <label for="">Ngày kết thúc</label>
                                <input type="date" class="form-control" name="ngayketthuc" value="<?=$row_capnhat['ngayketthuc']?>"><br>

                                <label for="">Tính năng mã</label>
                                <select name="tinhnangma" id="" class="form-control">
                                    <option value="0">----Chọn----</option>
                                    <?php
                                        if($row_capnhat['hinhthuckhuyenmai'] == 1){
                                            echo " <option value='1' selected>Giảm theo phần trăm</option>";
                                            echo " <option value='2'>Giảm theo giá tiền</option>";
                                        }else{
                                            echo " <option value='1' >Giảm theo phần trăm</option>";
                                            echo " <option value='2' selected>Giảm theo giá tiền</option>";
                                        }
                                    ?>
                                  
                                   

                                </select><br>

                                <label for="">Nhập số phần trăm hoặc tiền giảm</label>
                                <input type="text" class="form-control" name="giagiam" value="<?=$row_capnhat['giagiam']?>"><br>

                                <input type="submit" name="capnhatkhuyenmai" value="Cập nhật" class="btn btn-success">
                            </form>
                        </div>
                    <?php
                    } else { ?>
                        <div class="col-md-4">
                            <h4>Thêm Khuyến mãi</h4>
                            <form action="" method="POST">
                                <label for="">Tên mã giảm giá</label>
                                <input type="text" class="form-control" name="tenmagiamgia" placeholder="Nhập tên mã giảm giá"><br>

                                <label for="">Mã giảm giá</label>
                                <input type="text" class="form-control" name="magiamgia" placeholder="Nhập mã giảm giá"><br>


                                <label for="">Ngày bắt đầu</label>
                                <input type="date" class="form-control" name="ngaybatdau" placeholder="Nhập ngày bắt đầu"><br>

                                <label for="">Ngày kết thúc</label>
                                <input type="date" class="form-control" name="ngayketthuc" placeholder="Nhập ngày kết thúc"><br>

                                <label for="">Tính năng mã</label>
                                <select name="tinhnangma" id="" class="form-control">
                                    <option value="0">----Chọn----</option>
                                    <option value="1">Giảm theo phần trăm</option>
                                    <option value="2">Giảm theo giá tiền</option>

                                </select><br>

                                <label for="">Nhập số phần trăm hoặc tiền giảm</label>
                                <input type="text" class="form-control" name="giagiam" placeholder="Nhập phần trăm giảm hoặc số tiền giảm"><br>

                                <input type="submit" name="themmagiamgia" value="Thêm mã" class="btn btn-success">
                            </form>
                        </div>
                    <?php
                    }
                    ?>

                    <div class="col-md-8">
                        <h4>Liệt kê sản phẩm</h4>

                        <?php
                        $sql_select_km = mysqli_query($con, "SELECT * FROM khuyenmai ");

                        ?>
                        <table class="table  table-bordered ">
                            <tr>
                                <th>Thứ tự</th>
                                <th>Tên mã giảm giá</th>
                                <th>Mã giảm giá</th>
                                <th>Ngày bắt đầu</th>
                                <th>Ngày kết thúc</th>
                                <th>Điều kiện giảm giá</th>
                                <th>Số giảm</th>
                                <th>Thao tác</th>
                            </tr>

                            <?php
                            $i = 0;
                            while ($row_khuyenmai = mysqli_fetch_array($sql_select_km)) {
                                $i++;
                            ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $row_khuyenmai['tenmagiamgia'] ?></td>
                                    <td><?= $row_khuyenmai['makhuyenmai'] ?></td>
                                    <td><?= $row_khuyenmai['ngaybatdau'] ?></td>
                                    <td><?= $row_khuyenmai['ngayketthuc'] ?></td>
                                    <td><?php
                                        if ($row_khuyenmai['hinhthuckhuyenmai'] == 1) {
                                            echo 'Giảm theo phần trăm';
                                        } else {
                                            echo 'Giảm theo số tiền';
                                        }

                                        ?></td>
                                    <td><?php
                                        if ($row_khuyenmai['hinhthuckhuyenmai'] == 1) {
                                            echo   $row_khuyenmai['giagiam'] . '%';
                                        } else {
                                            echo number_format($row_khuyenmai['giagiam']) . '<sup>đ</sup>';
                                        }

                                        ?></td>
                                    <td><a href="?xoa=<?php echo $row_khuyenmai['makhuyenmai'] ?>">Xóa</a>
                                        || <a href="?quanly=capnhat&capnhat_id=<?php echo $row_khuyenmai['makhuyenmai'] ?>">Cập nhật</a>
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
    </script>


</body>

</html>