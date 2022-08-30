<?php
    include('../db/conn.php');
?>

<?php
    if(isset($_POST['submit'])){
        $tenncc = $_POST['tenncc'];

        $sql_insert_nhacungcap = mysqli_query($con,"INSERT INTO nhacungcap(tennhacungcap)  VALUES ('$tenncc')");
        
    }
    elseif(isset($_POST['capnhatncc'])){
        $id_update = $_POST['id_update'];
        $tenncc =   $_POST['tenncc'];     
        $sql_update_ncc = mysqli_query($con,"UPDATE nhacungcap  SET tennhacungcap = '$tenncc' where nhacungcap_id = '$id_update'");
    }
    if(isset($_GET['xoa'])){
        $id = $_GET['xoa'];
        $sql_xoa = mysqli_query($con,"DELETE FROM nhacungcap where nhacungcap_id = '$id'");
        
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhà cung cấp</title>
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

                        $id_capnhat = $_GET['capnhat_id'];
                        $sql_capnhat = mysqli_query($con,"SELECT * FROM nhacungcap where nhacungcap_id = '$id_capnhat'");
                        $row_capnhat = mysqli_fetch_array($sql_capnhat);
                        
                     ?>
                         <div class="col-md-4">
                        <h4>Cập nhật nhà cung cấp</h4>                
                        <form action="" method="POST" >
                            <label for="">Tên Nhà cung cấp</label>
                            <input type="text" class="form-control" name="tenncc" value="<?=$row_capnhat['tennhacungcap']?>"><br>
                            <input type="hidden" class="form-control" name="id_update" value="<?=$row_capnhat['nhacungcap_id']?>"><br>                          
                            <input type="submit" name="capnhatncc" value="Cập nhật" class="btn btn-success">
                        </form>
                    </div>
                    <?php
                   }else{ ?>
                      <div class="col-md-4">
                        <h4>Thêm Nhà cung cấp</h4>                
                        <form action="" method="POST" >
                            <label for="">Tên nhà cung cấp</label>
                            <input type="text" class="form-control" name="tenncc" placeholder="Tên nhà cung cấp"><br>                                                                    
                            <input type="submit" name="submit" value="Thêm" class="btn btn-success">
                        </form>
                    </div>
                    <?php
                     }
                    ?>
                
                    <div class="col-md-8">
                        <h4>Liệt kê nhà cung cấp</h4>

                        <?php
                            $sql_select_ncc = mysqli_query($con,"SELECT * FROM nhacungcap order by nhacungcap_id DESC");

                        ?>
                        <table class="table  table-bordered ">
                            <tr>
                                <th>Thứ tự</th>
                                <th>Tên nhà cung cấp</th>

                                <th>Thao tác</th>
                            </tr>
                        <?php
                            $i =0;
                            while($row_ncc = mysqli_fetch_array($sql_select_ncc)){
                                $i++;
                        ?>
                            <tr>
                                <td><?=$i?></td>
                                <td><?=$row_ncc['tennhacungcap']?></td>
                                
                                <td><a href="?xoa=<?php echo $row_ncc['nhacungcap_id']?>" onclick="return confirm('bạn có chắc muốn xóa nhà cung cấp này không')">Xóa</a>
                                || <a href="?quanly=capnhat&capnhat_id=<?php echo $row_ncc['nhacungcap_id']?>">Cập nhật</a>
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

        CKEDITOR.replace('ckeditor');
        CKEDITOR.replace('ckeditor1');
        
    </script>


</body>
</html>