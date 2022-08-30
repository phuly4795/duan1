    <!-- header -->
    <header>
        <!-- bottom header -->
        <div class="bg-second">
            <div class="bottom-header container">
                <ul class="main-menu">
                    <li><a href="index.php">Trang chủ</a></li>
                    <!-- mega menu -->
                    <li class="mega-dropdown">
                        <a href="./products.html">Sản phẩm<i class='bx bxs-chevron-down'></i></a>
                        <div class="mega-content">
                            <div class="row">
                                <?php
                                $sql_menu = mysqli_query($con, 'SELECT * FROM category order by category_id ASC');
                                while ($row_menu = mysqli_fetch_array($sql_menu)) {
                                ?>
                                    <div class="col-3 col-md-12">
                                        <div class="box">
                                            <a href="index.php?quanly=danhmuc&id=<?= $row_menu['category_id'] ?>">
                                                <h3><?php echo $row_menu['category_name'] ?></h3>
                                            </a>
                                            <?php
                                            $id = $row_menu['category_id'];
                                            $sql_tensp = mysqli_query($con, "SELECT * FROM category,sanpham  
                                                    where category.category_id = sanpham.category_id and sanpham.category_id = $id limit 4");
                                            while ($row_tensp = mysqli_fetch_array($sql_tensp)) {
                                            ?>
                                                <ul>
                                                    <li><a href="?quanly=chitietsanpham&id=<?= $row_tensp['sanpham_id'] ?>"><?= $row_tensp['sanpham_name'] ?></a></li>
                                                </ul>
                                            <?php
                                            }
                                            ?>
                                        </div>

                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="row img-row">
                                <div class="col-3">
                                    <div class="box">
                                        <img src="./images/phone_menu.png" alt="">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="box">
                                        <img src="./upload/JBL_JR 310BT_Product Image_Hero_Skyblue.png" alt="">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="box">
                                        <img src="./images/smartwatch_menu.png" alt="">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="box">
                                        <img src="./upload/JBLHorizon_001_dvHAMaster.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>

                    <!-- end mega menu -->
                    <?php
                    $sql_danhmuc_tin = mysqli_query($con, "SELECT * FROM danhmuc_tintuc order by danhmuctin_id DESC")
                    ?>
                    <li class="mega-dropdown">
                        <a href="?quanly=tintuc">Tin tức<i class='bx bxs-chevron-down'></i></a>
                        <div class="mega-content">
                            <div class="row">
                                <?php
                                while ($row_tintuc = mysqli_fetch_array($sql_danhmuc_tin)) {
                                ?>
                                    <div class="col-3 col-md-12">
                                        <div class="box">
                                            <a href="?quanly=tintuc&id_tin=<?= $row_tintuc['danhmuctin_id'] ?>">
                                                <h3><?php echo $row_tintuc['tendanhmuc'] ?></h3>
                                            </a>

                                            <?php
                                            $id_bv = $row_tintuc['danhmuctin_id'];
                                            $sql_tintuc_home = mysqli_query($con, "SELECT * FROM baiviet,danhmuc_tintuc 
                                                where  baiviet.danhmuctin_id = danhmuc_tintuc.danhmuctin_id and baiviet.danhmuctin_id = '$id_bv' limit 4 ");                                      

                                            $row_tintuc_home = mysqli_fetch_array($sql_tintuc_home)
                                            ?>
                                            <ul>
                                                <li><a href="?quanly=chitiettin&id_tin=<?=$row_tintuc_home['baiviet_id']?>"><?=$row_tintuc_home['tenbaiviet']?></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>

                        </div>
                    </li>
                    </li>
                    <li><a href="?quanly=lienhe">Liên hệ</a></li>
                </ul>
            </div>
        </div>
        <!-- end bottom header -->
        </div>
        <!-- end main header -->
    </header>
    <!-- end header -->
    <!-- mega menu -->

    <!-- end mega menu -->