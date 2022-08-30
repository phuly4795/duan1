<?php
include('../db/conn.php');
?>

<?php
if (isset($_POST['thembaiviet'])) {
    $tenbaiviet = $_POST['tenbaiviet'];
    $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];

    $danhmuc = $_POST['danhmuc'];
    $chitiet = $_POST['chitiet'];
    $mota = $_POST['mota'];
    $path = '../upload/';

    $sql_insert_product = mysqli_query($con, "INSERT INTO baiviet(tenbaiviet,tomtat,noidung,danhmuctin_id,baiviet_img)
             VALUES ('$tenbaiviet','$mota','$chitiet','$danhmuc','$hinhanh')");

    move_uploaded_file($hinhanh_tmp, $path . $hinhanh);
} elseif (isset($_POST['capnhatbaiviet'])) {
    $id_update = $_POST['id_update'];
    $tenbaiviet = $_POST['tenbaiviet'];
    $hinhanh = $_FILES['hinhanh']['name'];
    $hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
   
    $danhmuc = $_POST['danhmuc'];
   
    $chitiet = $_POST['chitiet'];
    $mota = $_POST['mota'];
    $path = '../upload/';

    if ($hinhanh == '') {
        $sql_update_img = "UPDATE baiviet SET tenbaiviet = '$tenbaiviet',tomtat = '$mota', noidung = '$chitiet', danhmuctin_id = '$danhmuc'
            where baiviet_id = '$id_update'";
    } else {
        move_uploaded_file($hinhanh_tmp, $path . $hinhanh);
        $sql_update_img = "UPDATE baiviet SET tenbaiviet = '$tenbaiviet', tomtat = '$mota', noidung = '$chitiet', danhmuctin_id = '$danhmuc',
        baiviet_img = '$hinhanh' where baiviet_id = '$id_update'";
    }
    mysqli_query($con, $sql_update_img);
}
if (isset($_GET['xoa'])) {
    $id = $_GET['xoa'];
    $sql_xoa = mysqli_query($con, "DELETE FROM baiviet where baiviet_id = '$id'");
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
                        $sql_capnhat = mysqli_query($con, "SELECT * FROM baiviet where baiviet_id = '$id_capnhat'");
                        $row_capnhat = mysqli_fetch_array($sql_capnhat);
                        $id_category_1 = $row_capnhat['danhmuctin_id'];
                        
                    ?>
                        <div class="col-md-4">
                            <h4>Cập nhật bài viết</h4>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <label for="">Tên bài viết</label>
                                <input type="text" class="form-control" name="tenbaiviet" value="<?= $row_capnhat['tenbaiviet'] ?>"><br>
                                <input type="hidden" class="form-control" name="id_update" value="<?= $row_capnhat['baiviet_id'] ?>"><br>
                                <label for="">Hình sản phẩm</label>
                                <input type="file" class="form-control" name="hinhanh"><br>
                                <img src="../upload/<?= $row_capnhat['baiviet_img'] ?>" alt="" height="80" width="80"><br>
                                
                             
                                                     
                                <label for="">Mô tả sản phẩm</label>
                                <textarea class="form-control" name="mota" id="ckeditor1" cols="30" rows="10">
                                <?= $row_capnhat['tomtat'] ?>
                            </textarea><Br>
                                <label for="">Chi tiết sản phẩm</label>
                                <textarea class="form-control" name="chitiet" id="ckeditor" cols="30" rows="10">
                                <?= $row_capnhat['noidung'] ?>
                            </textarea><br>
                                <label for="">Danh mục</label>
                                <?php
                                $sql_danhmuc = mysqli_query($con, "SELECT * FROM danhmuc_tintuc order by danhmuctin_id DESC");

                                ?>
                                <select name="danhmuc" id="" class="form-control">
                                    <option value="0">----Chọn danh mục----</option>
                                    <?php
                                    while ($row_danhmuc = mysqli_fetch_array($sql_danhmuc)) {
                                        if ($id_category_1 == $row_danhmuc['danhmuctin_id']) {
                                    ?>
                                            <option selected value="<?= $row_danhmuc['danhmuctin_id'] ?>"><?= $row_danhmuc['tendanhmuc'] ?></option>
                                        <?php
                                        } else {
                                        ?>
                                            <option value="<?= $row_danhmuc['danhmuctin_id'] ?>"><?= $row_danhmuc['tendanhmuc'] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select><br>

                            
                                <input type="submit" name="capnhatbaiviet" value="Cập nhật bài viết" class="btn btn-success">
                            </form>
                        </div>
                    <?php
                    } else { ?>
                        <div class="col-md-4">
                            <h4>Thêm bài viết</h4>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <label for="">Tên bài viết</label>
                                <input type="text" class="form-control" name="tenbaiviet" placeholder="Tên sản phẩm"><br>
                                <label for="">Hình sản phẩm</label>
                                <input type="file" class="form-control" name="hinhanh"><br>
                                <label for="">Mô tả ngắn</label>
                                <textarea class="form-control" name="mota" id="ckeditor1" cols="30" rows="10"></textarea><Br>
                                <label for="">Nội dung</label>
                                <textarea class="form-control" name="chitiet" id="ckeditor" cols="30" rows="10"></textarea><br>
                                <label for="">Danh mục sản phẩm</label>
                                <?php
                                $sql_danhmuc = mysqli_query($con, "SELECT * FROM danhmuc_tintuc order by danhmuctin_id DESC");

                                ?>
                                <select name="danhmuc" id="" class="form-control">
                                    <option value="0">----Chọn danh mục----</option>
                                    <?php
                                    while ($row_danhmuc = mysqli_fetch_array($sql_danhmuc)) {
                                    ?>
                                        <option value="<?= $row_danhmuc['danhmuctin_id'] ?>"><?= $row_danhmuc['tendanhmuc'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select><br>


                                <input type="submit" name="thembaiviet" value="Thêm bài viết" class="btn btn-success">
                            </form>
                        </div>
                    <?php
                    }
                    ?>

                    <div class="col-md-8">
                        <h4>Liệt kê bài viết</h4>

                        <?php
                        $sql_select_bv = mysqli_query($con, "SELECT * FROM baiviet,danhmuc_tintuc 
                            where baiviet.danhmuctin_id = danhmuc_tintuc.danhmuctin_id
                                order by baiviet.baiviet_id DESC");

                        ?>
                        <table class="table  table-bordered ">
                            <tr>
                                <th>Thứ tự</th>
                                <th>Tên sản phẩm</th>
                                <th>Hình ảnh</th>

                                <th>Danh mục</th>

                                <th>Thao tác</th>
                            </tr>
                            <?php
                            $i = 0;
                            while ($row_baiviet = mysqli_fetch_array($sql_select_bv)) {
                                $i++;
                            ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td><?= $row_baiviet['tenbaiviet'] ?></td>
                                    <td><img src="../upload/<?= $row_baiviet['baiviet_img'] ?>" alt="" height="80" width="80"></td>

                                    <td><?= $row_baiviet['tendanhmuc'] ?></td>

                                    <td><a href="?xoa=<?php echo $row_baiviet['baiviet_id'] ?>" onclick="return confirm('bạn có chắc muốn xóa bài viết này không')">Xóa</a>
                                        || <a href="xulybaiviet.php?quanly=capnhat&capnhat_id=<?php echo $row_baiviet['baiviet_id'] ?>">Cập nhật</a>
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