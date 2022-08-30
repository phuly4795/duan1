<?php
include('../db/conn.php');
?>

<?php
if (isset($_POST['themdanhmuc'])) {
    $tendanhmuc = $_POST['danhmuc'];
    $sql_insert = mysqli_query($con, "INSERT INTO category(category_name) VALUES ('$tendanhmuc')");
} elseif (isset($_POST['capnhatdanhmuc'])) {
    $id_post_capnhat = $_POST['id_danhmuc'];
    $tendanhmuc = $_POST['danhmuc'];
    $sql_update = mysqli_query($con, "UPDATE category SET category_name = '$tendanhmuc' where category_id = '$id_post_capnhat'");
    header('Location: xulydanhmuc.php');
}
if (isset($_GET['xoa'])) {
    $id = $_GET['xoa'];
    $sql_xoa = mysqli_query($con, "DELETE FROM category where category_id = '$id'");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống kê</title>
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
            <?php
            if(isset($_POST['xembieudo'])){
            ?>
                <h1 class="text-center">THỐNG KÊ DANH MỤC</h1>

                <div id="piechart"></div>

                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

                <script type="text/javascript">
                    // Load google charts
                    google.charts.load('current', {
                        'packages': ['corechart']
                    });
                    google.charts.setOnLoadCallback(drawChart);

                    // Draw the chart and set the chart values
                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                            ['Danh mục', 'Số lượng sản phẩm'],
                            <?php
                            $sql_thongke = mysqli_query($con, "SELECT category.category_id as madm,category.category_name as tendm, count(sanpham.sanpham_id) 
   as countsp, min(sanpham.sanpham_giakhuyenmai) as minprice, max(sanpham.sanpham_giakhuyenmai) as maxprice, avg(sanpham.sanpham_giakhuyenmai) as avgprice
       from sanpham,category where category.category_id=sanpham.category_id 
            group by category.category_id desc");
                            while ($row_thongke = mysqli_fetch_array($sql_thongke)) {
                                $tongdm = count($row_thongke);
                                $i = 1;


                                if ($i == $tongdm) $dauphay = "";
                                else $dauphay = ",";
                                echo "['" . $row_thongke['tendm'] . "', " . $row_thongke['countsp'] . "]", $dauphay;
                                $i += 1;
                            }
                            ?>

                        ]);

                        // Optional; add a title and set the width and height of the chart
                        var options = {
                            'title': 'Thống kê sản phẩm theo danh mục',
                            'width': 700,
                            'height': 500
                        };

                        // Display the chart inside the <div> element with id="piechart"
                        var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                        chart.draw(data, options);
                    }
                </script>
                 <form action="" method="POST">
                            <input type="submit" name="trove" value="Trở về" style="margin-left: 15%;">
                        </form>
            <?php
            } else {
            ?>
                <div class="container">
                    <div class="giohang">
                        <div class="row frmtitle mb ">
                            <H1>THỐNG KÊ SẢN PHẨM THEO DANH MỤC</H1>
                        </div>

                        <div class="col-md-12">
                            <?php
                            $sql_thongke = mysqli_query($con, "SELECT category.category_id as madm,category.category_name as tendm, count(sanpham.sanpham_id) 
                               as countsp, min(sanpham.sanpham_giakhuyenmai) as minprice, max(sanpham.sanpham_giakhuyenmai) as maxprice, avg(sanpham.sanpham_giakhuyenmai) as avgprice
                                   from sanpham,category where category.category_id=sanpham.category_id 
                                        group by category.category_id desc");

                            ?>
                            <table class="table  table-bordered ">

                                <tr>
                                    <th>Mã danh mục</th>
                                    <th>Tên danh mục</th>
                                    <th>Số lượng</th>
                                    <th>Giá cao nhất</th>
                                    <th>Giá thấp nhất</th>
                                    <th>Giá trung bình</th>
                                </tr>
                                <?php
                                while ($row_thongke = mysqli_fetch_array($sql_thongke)) {
                                ?>
                                    <tr>
                                        <td><?= $row_thongke['madm'] ?></td>
                                        <td><?= $row_thongke['tendm'] ?></td>
                                        <td><?php echo $row_thongke['countsp'] ?></td>
                                        <td><?php echo number_format($row_thongke['minprice']) ?><sup>đ</sup></td>
                                        <td><?php echo number_format($row_thongke['maxprice']) ?><sup>đ</sup></td>
                                        <td><?php echo number_format($row_thongke['avgprice']) ?><sup>đ</sup></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </table>

                        </div>
                        <form action="" method="POST">
                            <input type="submit" name="xembieudo" value="Xem biểu đồ">
                        </form>
                    </div>
                </div>

            <?php } ?>
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