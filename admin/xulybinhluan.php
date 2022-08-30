<?php
    include('../db/conn.php');
?>
<?php

    if(isset($_GET['xoabinhluan'])){
        $id_binhluan = $_GET['xoabinhluan'];
        $sql_delete = mysqli_query($con,"DELETE FROM binhluan where binhluan_id = '$id_binhluan'");
    }
   
    if(isset($_GET['binhluan_id'])){
        $id_binhluan_duyet = $_GET['binhluan_id'];     
    }
    else{     
        $id_binhluan_duyet = '';      
    }  
    $sql_duyet_binhluan = mysqli_query($con,"UPDATE binhluan SET trangthai = 1 where binhluan_id = '$id_binhluan_duyet'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bình luận</title>
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
                    <div class="col-md-12">
                        <h4>Bình luận</h4>
                        <?php
                           $sql_select_binhluan = mysqli_query($con,"SELECT * FROM binhluan,sanpham 
                                where binhluan.sanpham_id = sanpham.sanpham_id 
                                    order by binhluan.binhluan_id DESC");
                        ?>
                        <table class="table  table-bordered ">
                            <tr>
                                <th>Thứ tự</th>
                                <th>Tên khách hàng</th>                      
                                <th>Nội dung bình luận</th>                      
                                <th>tên sản phẩm</th>                      
                                <th>Ngày bình luận</th>           
                                <th>Duyệt bình luận</th>                                                                                                                       
                            </tr>
                        <?php
                            $i =0;
                            while($row_binhluan = mysqli_fetch_array($sql_select_binhluan)){
                            $i++;
                        ?>
                            <tr>
                                <td><?=$i?></td>
                                <td><?=$row_binhluan['name']?></td>                   
                                <td><?=$row_binhluan['noidung']?></td>
                                <td><?=$row_binhluan['sanpham_name']?></td>
                                <td><?=$row_binhluan['ngaythang']?></td>  
                                <td>
                                    <a href="?quanly=duyet=1&binhluan_id=<?php echo $row_binhluan['binhluan_id']?>">
                                    <?php
                                     if($row_binhluan['trangthai']==0){
                                         echo 'Duyệt';
                                     }
                                     else{
                                         echo 'Đã duyệt';
                                     }
                                    // ?></a> ||
                                    <a href="?xoabinhluan=<?php echo $row_binhluan['binhluan_id']?>" onclick="return confirm('bạn có chắc muốn xóa bình luận')">Xóa</a>
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