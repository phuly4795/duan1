<?php
    include('../db/conn.php');
?>

<?php
    if(isset($_POST['themdanhmuc'])){
        $tendanhmuc = $_POST['danhmuc'];
        $sql_insert = mysqli_query($con,"INSERT INTO category(category_name) VALUES ('$tendanhmuc')");
    }
    elseif(isset($_POST['capnhatdanhmuc'])){
        $id_post_capnhat = $_POST['id_danhmuc'];
        $tendanhmuc = $_POST['danhmuc'];
        $sql_update = mysqli_query($con,"UPDATE category SET category_name = '$tendanhmuc' where category_id = '$id_post_capnhat'");
        header('Location: xulydanhmuc.php');
    }
    if(isset($_GET['xoa'])){
        $id = $_GET['xoa'];
        $sql_xoa = mysqli_query($con,"DELETE FROM category where category_id = '$id'");
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh mục</title>
    <link rel="stylesheet" href="../css/style_admin.css" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    <div class="container1">
    <?php
            include ('menu.php');
        ?>
        <!-- main -->
        
        <div class="main">
            <div class="toggle">
                <ion-icon name="menu-outline"></ion-icon>
            </div>
            <div class="container">
                <div class="row">

                <?php
                    if(isset($_GET['quanly']) =='capnhat'){                   

                        $id_capnhat = $_GET['id'];
                        $sql_capnhat = mysqli_query($con,"SELECT * FROM category where category_id = '$id_capnhat'");
                        $row_capnhat = mysqli_fetch_array($sql_capnhat);
                    ?>
                    <div class="col-md-4">
                        <h4>Cập nhật danh mục</h4>
                        <label for="">Tên danh mục</label>
                        <form action="" method="POST">
                            <input type="hidden" class="form-control" name="id_danhmuc" value="<?=$row_capnhat['category_id']?>">
                            <input type="text" class="form-control" name="danhmuc" value="<?=$row_capnhat['category_name']?>"><br>
                            <input type="submit" name="capnhatdanhmuc" value="Cập nhật danh mục" class="btn btn-success">
                        </form>
                    </div>
                    <?php
                    }else{ ?>
                      <div class="col-md-4">
                        <h4>Thêm danh mục</h4>
                        <label for="">Tên danh mục</label>
                        <form action="" method="POST">
                            <input type="text" class="form-control" name="danhmuc" placeholder="Tên danh mục"><br>
                            <input type="submit" name="themdanhmuc" value="Thêm danh mục" class="btn btn-success">
                        </form>
                    </div>
                    <?php
                    }
                    ?>
                
                    <div class="col-md-8">
                        <h4>Liệt kê danh mục</h4>

                        <?php
                            $sql_select = mysqli_query($con,"SELECT * FROM category order by category_id DESC");

                        ?>
                        <table class="table  table-bordered ">
                            <tr>
                                <th>Thứ tự</th>
                                <th>Tên danh mục</th>
                                <th>Thao tác</th>
                            </tr>
                        <?php
                            $i =0;
                            while($row_category = mysqli_fetch_array($sql_select)){
                                $i++;
                        ?>
                            <tr>
                                <td><?=$i?></td>
                                <td><?=$row_category['category_name']?></td>
                                <td><a href="?xoa=<?php echo $row_category['category_id']?> " onclick="return confirm('bạn có chắc muốn xóa tên danh mục')" >Xóa</a>
                                || <a href="?quanly=capnhat&id=<?php echo $row_category['category_id']?>">Cập nhật</a>
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

        toggle.onclick = function(){
            nav.classList.toggle('active');
            main.classList.toggle('active')
        }

        // thêm cái class hovered vào list item
        let list = document.querySelectorAll('.nav li');
        function activeLink(){
            list.forEach((item) =>
            item.classList.remove('hovered'));
            this.classList.add('hovered')
        }    
        list.forEach((item) =>
        item.addEventListener('mouseover',activeLink))
    </script>


</body>
</html>