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
    <title>S???n ph???m</title>
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
                            <h4>C???p nh???t s???n ph???m</h4>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <label for="">T??n s???n ph???m</label>
                                <input type="text" class="form-control" name="tensanpham" value="<?= $row_capnhat['sanpham_name'] ?>"><br>
                                <input type="hidden" class="form-control" name="id_update" value="<?= $row_capnhat['sanpham_id'] ?>"><br>
                                <label for="">H??nh s???n ph???m</label>
                                <input type="file" class="form-control" name="hinhanh"><br>
                                <img src="../upload/<?= $row_capnhat['sanpham_img'] ?>" alt="" height="80" width="80"><br>
                                <label for="">Gi?? s???n ph???m</label>
                                <input type="text" class="form-control" name="giasanpham" value="<?= $row_capnhat['sanpham_gia'] ?>"><br>
                                <label for="">Gi?? khuy???n m??i</label>
                                <input type="text" class="form-control" name="giakhuyenmai" value="<?= $row_capnhat['sanpham_giakhuyenmai'] ?>"><br>
                                <label for="">S??? l?????ng</label>
                                <input type="text" class="form-control" name="soluong" value="<?= $row_capnhat['sanpham_soluong'] ?>"><br>
                                <label for="">T??nh tr???ng</label><br>
                                <?php
                                if ($row_capnhat['sanpham_soluong'] == 0) {
                                    echo ' <input type="radio" name="tt" id="" value="0"  >C??n h??ng';
                                    echo '  <input type="radio" name="tt" id="" value="1" checked >H???t h??ng <br><br>';
                                } else {
                                    echo '  <input type="radio" name="tt" id="" value="0" checked>C??n h??ng';
                                    echo '  <input type="radio" name="tt" id=""  value="1"  >H???t h??ng <br><br>';
                                }
                                ?>
                                <label for="">S???n ph???m hot</label><br>
                                <?php
                                if ($row_capnhat['sanpham_hot'] == 0) {
                                    echo ' <input type="radio" name="sph" id="" value="0" checked>S???n ph???m th?????ng';
                                    echo ' <input type="radio" name="sph" id="" value="1">S???n ph???m hot<br><br>';
                                } else {
                                    echo ' <input type="radio" name="sph" id="" value="0" >S???n ph???m th?????ng';
                                    echo ' <input type="radio" name="sph" id="" value="1" checked>S???n ph???m hot<br><br>';
                                }
                                ?>
                                <label for="">M?? t??? s???n ph???m</label>
                                <textarea class="form-control" name="mota" id="ckeditor1" cols="30" rows="10">
                                <?= $row_capnhat['sanpham_mota'] ?>
                            </textarea><Br>
                                <label for="">Chi ti???t s???n ph???m</label>
                                <textarea class="form-control" name="chitiet" id="ckeditor" cols="30" rows="10">
                                <?= $row_capnhat['sanpham_chitiet'] ?>
                            </textarea><br>
                                <label for="">Danh m???c s???n ph???m</label>
                                <?php
                                $sql_danhmuc = mysqli_query($con, "SELECT * FROM category order by category_id DESC");

                                ?>
                                <select name="danhmuc" id="" class="form-control">
                                    <option value="0">----Ch???n danh m???c----</option>
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

                                <label for="">Nh?? cung c???p s???n ph???m</label>
                                <?php
                                $sql_ncc = mysqli_query($con, "SELECT * FROM nhacungcap order by nhacungcap_id DESC");

                                ?>
                                <select name="ncc" id="" class="form-control">
                                    <option value="0">----Ch???n Nh?? cung c???p----</option>
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
                                <input type="submit" name="capnhatsanpham" value="C???p nh???t s???n ph???m" class="btn btn-success">
                            </form>
                        </div>
                    <?php
                    } else { ?>
                        <div class="col-md-4">
                            <h4>Th??m S???n ph???m</h4>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <label for="">T??n s???n ph???m</label>
                                <input type="text" class="form-control" name="tensanpham" placeholder="T??n s???n ph???m"><br>
                                <label for="">H??nh s???n ph???m</label>
                                <input type="file" class="form-control" name="hinhanh"><br>
                                <label for="">Gi?? s???n ph???m</label>
                                <input type="text" class="form-control" name="giasanpham" placeholder="Gi?? s???n ph???m"><br>
                                <label for="">Gi?? khuy???n m??i</label>
                                <input type="text" class="form-control" name="giakhuyenmai" placeholder="Gi?? khuy???n m??i"><br>
                                <label for="">S??? l?????ng</label>
                                <input type="text" class="form-control" name="soluong" placeholder="S??? l?????ng s???n ph???m"><br>
                                <label for="">S???n ph???m hot</label><br>
                                <input type="radio" name="sph" id="" value="0" checked>S???n ph???m th?????ng
                                <input type="radio" name="sph" id="" value="1">S???n ph???m hot<br><br>
                                <label for="">M?? t??? s???n ph???m</label>
                                <textarea class="form-control" name="mota" id="ckeditor1" cols="30" rows="10"></textarea><Br>
                                <label for="">Chi ti???t s???n ph???m</label>
                                <textarea class="form-control" name="chitiet" id="ckeditor" cols="30" rows="10"></textarea><br>
                                <label for="">Danh m???c s???n ph???m</label>
                                <?php
                                $sql_danhmuc = mysqli_query($con, "SELECT * FROM category order by category_id DESC");

                                ?>
                                <select name="danhmuc" id="" class="form-control">
                                    <option value="0">----Ch???n danh m???c----</option>
                                    <?php
                                    while ($row_danhmuc = mysqli_fetch_array($sql_danhmuc)) {
                                    ?>
                                        <option value="<?= $row_danhmuc['category_id'] ?>"><?= $row_danhmuc['category_name'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select><br>

                                <label for="">Nh?? cung c???p s???n ph???m</label>
                                <?php
                                $sql_ncc = mysqli_query($con, "SELECT * FROM nhacungcap order by nhacungcap_id DESC");

                                ?>
                                <select name="ncc" id="" class="form-control">
                                    <option value="0">----Ch???n Nh?? cung c???p----</option>
                                    <?php
                                    while ($row_ncc = mysqli_fetch_array($sql_ncc)) {
                                    ?>
                                        <option value="<?= $row_ncc['nhacungcap_id'] ?>"><?= $row_ncc['tennhacungcap'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select><br>
                                <input type="submit" name="themsanpham" value="Th??m danh m???c" class="btn btn-success">
                            </form>
                        </div>
                    <?php
                    }
                    ?>

                    <div class="col-md-8">
                        <h4>Li???t k?? s???n ph???m</h4>

                        <?php
                        $sql_select_sp = mysqli_query($con, "SELECT * FROM sanpham,category where sanpham.category_id = category.category_id
                                order by sanpham.sanpham_id DESC");

                        ?>
                        <table class="table  table-bordered ">
                            <tr>
                                <th>Th??? t???</th>
                                <th>T??n s???n ph???m</th>
                                <th>H??nh ???nh</th>
                                <th>S??? l?????ng</th>
                                <th>Danh m???c</th>
                                <th>Gi?? s???n ph???m</th>
                                <th>Gi?? khuy???n m??i</th>
                                <th>Thao t??c</th>
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
                                    <td><?php echo number_format($row_sanpham['sanpham_gia']) ?><sup>??</sup></td>
                                    <td><?php echo number_format($row_sanpham['sanpham_giakhuyenmai']) ?><sup>??</sup></td>
                                    <td><a href="?xoa=<?php echo $row_sanpham['sanpham_id'] ?>">X??a</a>
                                        || <a href="xulysanpham.php?quanly=capnhat&capnhat_id=<?php echo $row_sanpham['sanpham_id'] ?>">C???p nh???t</a>
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
        // ????ng m??? menu
        let toggle = document.querySelector('.toggle');
        let nav = document.querySelector('.nav');
        let main = document.querySelector('.main');

        toggle.onclick = function() {
            nav.classList.toggle('active');
            main.classList.toggle('active')
        }

        // th??m c??i class hovered v??o list item
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