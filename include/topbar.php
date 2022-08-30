    <?php
    if (isset($_GET['dangxuat'])) {
        $id = $_GET['dangxuat'];
        if ($id == 1) {
            unset($_SESSION['dangnhap_home']);
        }

        header('Location: index.php');
    }
    ?>

    <!-- mobile menu -->
    <div class="mobile-menu bg-second">
        <a href="index.php" class="mb-logo">TPShop</a>
        <span class="mb-menu-toggle" id="mb-menu-toggle">
            <i class='bx bx-menu'></i>
        </span>
    </div>
    <!-- end mobile menu -->
    <!-- main header -->
    <div class="header-wrapper" id="header-wrapper">
        <span class="mb-menu-toggle mb-menu-close" id="mb-menu-close">
            <i class='bx bx-x'></i>
        </span>

        <!-- mid header -->
        <div class="bg-main">
            <div class="mid-header container">
                <a href="index.php" class="logo">TPShop</a>
                <?php
                  if(isset($_POST['search_button'])){
                    $search = $_POST['search_product'];
                    if($search == ''){
                        echo "<script>alert('Chưa nhập tên sản phẩm cần tìm kiếm')</script>";

                    }
                  }
                ?>

                <div class="search">
                    <form action="" method="POST">
                        <input type="text" placeholder="Tìm kiếm sản phẩm" name="search_product">
                        <a href="?quanly=timkiem"><button type="submit" name="search_button"><i class='bx bx-search-alt'></i></button></a>
                    </form>
                </div>


                <ul class="user-menu">
                    <!-- <li><a href="#"><i class='bx bx-bell'></i></a></li> -->
                    <li><a href="?quanly=giohang"><i class='bx bx-cart'></i></a></li>
                    <?php
                    $login = "<li><a href= './include/login.php'><i class='bx bx-user-circle'></i></a></li>";
                    if (isset($_SESSION['dangnhap_home'])) { ?>
                    <li><a href="">
                        <?php
                            $id_kh = $_SESSION['khachhang_id'];
                            $sql_img = mysqli_query($con,"SELECT * FROM khachhang where khachhang_id = '$id_kh'");
                            $row_img = mysqli_fetch_array($sql_img);
                        ?>
                            <div class="user">
                                <img src="upload/<?=$row_img['khachhang_img']?>" alt="3213213">
                            </div>
                        </a></li>
                   
                        <span class="tendn" id="view">
                            <li style="margin-top: 4%; margin-left: 18px;cursor: pointer;">
                                <h4 style="margin-top: 7%;"><?=$_SESSION['dangnhap_home'] ?></h4>
                            </li>
                        </span>
                        <div class="tuychon" id="view">

                            <span class=""><i class='bx bxs-user'></i><a href="index.php?quanly=profile">Tài khoản của tôi</a></span>
                            <span class=""><i class='bx bxs-user'></i><a href="index.php?quanly=doimk">Đổi mật khẩu</a></span>
                            <span class="tk"><i class='bx bxs-user'></i><a href="index.php?quanly=mybill&id_khachhang=<?= $_SESSION['khachhang_id'] ?>">Đơn hàng của tôi</a></span>
                            <span class="dangxuat"><i class='bx bx-log-out'></i><a href="?dangxuat=1">Đăng xuất</a></span>
                        </div>
                    <?php } else {
                        echo $login;
                    }
                    ?>

                </ul>
            </div>
        </div>
        <!-- end mid header -->
        <style>
            .tuychon {
                visibility: hidden;
                position: absolute;
                background-color: #e3e3e3;
                width: 15%;
                right: 1%;
                top: calc(100% + -16px);
                border-radius: 5px;
            }

            .tuychon span {
                float: left;
            }

            .tuychon span a,
            i {
                margin-top: 6%;
                margin-left: 10px;
            }

            .tuychon.active {
                height: 180%;

                visibility: visible;
                z-index: 10000;
            }

            .user {
                position: relative;
                width: 40px;
                height: 40px;
                border-radius: 50%;
                overflow: hidden;
                cursor: pointer;
            }

            .user img {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                object-fit: cover;
            }
        </style>
        <script>
            document.querySelector('#view').addEventListener('click', () => {
                let content = document.querySelector('.tendn')
                content.classList.toggle('active')

                let content1 = document.querySelector('.tuychon')
                content1.classList.toggle('active')

            })
        </script>
    