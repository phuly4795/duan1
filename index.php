<?php
session_start();
include_once('db/conn.php')
?>

<!DOCTYPE html>
<html lang="en">
<script src="https://use.fontawesome.com/890ff96aad.js"></script>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <title>TPShop</title>
    <!-- google font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,900&display=swap" rel="stylesheet">
    <!-- boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

    <!-- app css -->
    <link rel="stylesheet" href="./css/grid.css">
    <link rel="stylesheet" href="./css/app.css">
    <link rel="stylesheet" href="./css/profile_new.css">
    <link rel="stylesheet" href="./css/doimk.css">
    <link rel="stylesheet" href="./css/Contact.css">
  
 
 
    
    <link rel="stylesheet" href="./css/nicepage.css">
  
   
    <link rel="stylesheet" href="./css/Shopping-Cart-Template-2.css">

</head>

<body>
    <?php
    include('include/topbar.php');
    include('include/menu.php');
    if (isset($_GET['quanly'])) {
        $tam = $_GET['quanly'];
    } else {
        $tam = '';
    }
    if ($tam == 'danhmuc') {
        include('include/danhmuc.php');
    } elseif ($tam == 'chitietsanpham') {
        include('include/chitietsanpham.php');
    } elseif ($tam == 'giohang') {
        include('include/giohang.php');
    } elseif ($tam == 'timkiem') {
        include('include/timkiem.php');
    } elseif ($tam == 'confirm') {
        include('include/confirm.php');
    } elseif ($tam == 'chitiettin') {
        include('include/chitiettin.php');
    } elseif ($tam == 'doimk') {
        include('include/doimk.php');
    } elseif ($tam == 'lienhe') {
        include('include/lienhe.php');
    } elseif ($tam == 'profile') {
        include('include/profile.php');
    } elseif ($tam == 'tintuc') {
        include('include/tintuc.php');
    } elseif ($tam == 'mybill') {
        include('include/mybill.php');
    } else {
        include('include/slider.php');
        include('include/home.php');
        include('include/blog.php');
    }


    include('include/footer.php');


    ?>
    <!-- app js -->
    <script src="./js/app.js"></script>
    <script src="./js/index.js"></script>
    <script src="./js/products.js"></script>
    <script src="./js/product-detail.js"></script>
    <script src="./js/nicepage.js"></script>
    <script src="./js/jquery.js"></script>


</body>

</html>