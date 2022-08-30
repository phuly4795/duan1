        <?php
        if (isset($_GET['trang'])) {
            $page = $_GET['trang'];
        } else {
            $page = '';
        }
        if ($page == '' || $page == 1) {
            $begin = 0;
        } else {
            $begin = ($page * 6) - 6;
        }
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
        } else {
            $id = '';
        }
        $sql_cate = mysqli_query($con, "SELECT * FROM category,sanpham  where category.category_id = sanpham.category_id AND
                sanpham.category_id='$id' order by sanpham.sanpham_id DESC limit $begin,6 ");
        $sql_category = mysqli_query($con, "SELECT * FROM category,sanpham  where category.category_id = sanpham.category_id AND
                sanpham.category_id='$id' order by sanpham.sanpham_id DESC");
        $row_title = mysqli_fetch_array($sql_category);
        $title = $row_title['category_name'];
        ?>

        <!-- products content -->
        <div class="bg-main">
            <div class="container">
                <div class="box">
                    <div class="breadcumb">
                        <a href="index.php">Trang chủ</a>
                        <span><i class='bx bxs-chevrons-right'></i></span>
                        <?php echo $title ?>
                    </div>
                </div>
                <div class="box">
                    <div class="row">
                        <div class="col-3 filter-col" id="filter-col">
                            <div class="box filter-toggle-box">
                                <button class="btn-flat btn-hover" id="filter-close">close</button>
                            </div>
                            <div class="box">
                                <span class="filter-header">
                                    Danh mục
                                </span>
                                <?php
                                $sql_category_sidebar = mysqli_query($con, 'SELECT * FROM category order by category_id ASC');
                                while ($row_category_sidebar = mysqli_fetch_array($sql_category_sidebar)) {
                                ?>
                                    <ul class="filter-list">
                                        <li><a href="?quanly=danhmuc&id=<?= $row_category_sidebar['category_id'] ?>"><?= $row_category_sidebar['category_name'] ?></a></li>
                                    </ul>
                                <?php
                                }
                                ?>
                            </div>
                            <!-- <div class="box">
                                <span class="filter-header">
                                    Thương hiệu
                                </span>
                                <ul class="filter-list">
                                    <li>
                                        <div class="group-checkbox">
                                            <input type="checkbox" id="remember1" checked="checked">
                                            <label for="remember1">
                                                JBL
                                                <i class='bx bx-check'></i>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="group-checkbox">
                                            <input type="checkbox" id="remember2">
                                            <label for="remember2">
                                                Beat
                                                <i class='bx bx-check'></i>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="group-checkbox">
                                            <input type="checkbox" id="remember3">
                                            <label for="remember3">
                                                Logitech
                                                <i class='bx bx-check'></i>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="group-checkbox">
                                            <input type="checkbox" id="remember4">
                                            <label for="remember4">
                                                Samsung
                                                <i class='bx bx-check'></i>
                                            </label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="group-checkbox">
                                            <input type="checkbox" id="remember5">
                                            <label for="remember5">
                                                Sony
                                                <i class='bx bx-check'></i>
                                            </label>
                                        </div>
                                    </li>
                                </ul>
                            </div> -->
                        </div>

                        <?php
                        if (isset($_GET['sanphammoi'])) {
                            if (isset($_GET['trang'])) {
                                $page = $_GET['trang'];
                            } else {
                                $page = '';
                            }
                            if ($page == '' || $page == 1) {
                                $begin = 0;
                            } else {
                                $begin = ($page * 6) - 6;
                            }
                            $sql_sanphammoi_dm = mysqli_query($con, "SELECT * FROM sanpham where sanpham_active = 0 order by sanpham_id DESC limit $begin,6");

                        ?>
                            <div class="col-9 col-md-12">
                                <div class="box filter-toggle-box">
                                    <button class="btn-flat btn-hover" id="filter-toggle">filter</button>
                                </div>

                                <div class="box">
                                    <div class="row" id="products">
                                        <?php
                                        while ($row_sanphammoi_dm = mysqli_fetch_array($sql_sanphammoi_dm)) {
                                        ?>
                                            <div class="col-4 col-md-6 col-sm-12">

                                                <div class="product-card">
                                                    <div class="product-card-img">
                                                        <a href="?quanly=chitietsanpham&id=<?= $row_sanphammoi_dm['sanpham_id'] ?>">
                                                            <img src="upload/<?= $row_sanphammoi_dm['sanpham_img'] ?>" alt="">
                                                            <img src="upload/<?= $row_sanphammoi_dm['sanpham_img'] ?>" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="product-card-info">
                                                        <div class="product-btn">
                                                            <form action="?quanly=giohang" method="POST">
                                                                <input type="hidden" name="tensanpham" value="<?= $row_sanphammoi_dm['sanpham_name'] ?>">
                                                                <input type="hidden" name="sanpham_id" value="<?= $row_sanphammoi_dm['sanpham_id'] ?>">
                                                                <input type="hidden" name="sanphamgia" value="<?= $row_sanphammoi_dm['sanpham_giakhuyenmai'] ?>">
                                                                <input type="hidden" name="hinhanh" value="<?= $row_sanphammoi_dm['sanpham_img'] ?>">
                                                                <input type="hidden" name="soluong" value="1">
                                                                <input type="submit" name="themgiohang" class="btn-flat btn-hover" value="Thêm giỏ hàng">
                                                            </form>
                                                            <a href="?quanly=chitietsanpham&id=<?= $row_sanphammoi_dm['sanpham_id'] ?>" class="btn-flat btn-hover btn-shop-now"><i class='bx bx-search-alt'></i></a>
                                                        </div>
                                                        <div class="product-card-name">
                                                            <?= $row_sanphammoi_dm['sanpham_name'] ?>
                                                        </div>
                                                        <div class="product-card-price">
                                                            <span><del>
                                                                    <?php

                                                                    if ($row_sanphammoi_dm['sanpham_gia'] == 0) {
                                                                        echo '';
                                                                    } else {
                                                                        $giagiam =  number_format($row_sanphammoi_dm['sanpham_gia']);
                                                                        echo "$giagiam.<sup>đ</sup>";
                                                                    }
                                                                    ?>
                                                                </del></span> <span class="curr-price"><?php echo number_format($row_sanphammoi_dm['sanpham_giakhuyenmai']) ?><sup>đ</sup></span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        <?php
                                        }

                                        ?>
                                    </div>
                                </div>

                                <div class="box">
                                    <?php
                                    $sql_trang = mysqli_query($con, "SELECT * FROM sanpham where sanpham_active = 0 ");
                                    $row_count = mysqli_num_rows($sql_trang);
                                    $trang = ceil($row_count / 6);
                                    ?>
                                    <ul class="pagination">

                                        <?php
                                        for ($i = 1; $i <= $trang; $i++) {
                                        ?>
                                            <li><a href="index.php?quanly=danhmuc&sanphammoi&trang=<?= $i ?>" <?php if ($i == $page) {
                                                                                                                    echo 'class="active"';
                                                                                                                } else {
                                                                                                                    echo '';
                                                                                                                }  ?>><?= $i ?></a>
                                            </li>
                                        <?php
                                        }
                                        ?>


                                    </ul>
                                </div>
                            </div>
                        <?php
                        } elseif (isset($_GET['sanphamhot'])) {
                            if (isset($_GET['trang'])) {
                                $page = $_GET['trang'];
                            } else {
                                $page = '';
                            }
                            if ($page == '' || $page == 1) {
                                $begin = 0;
                            } else {
                                $begin = ($page * 6) - 6;
                            }
                            $sql_sanphamhot_dm = mysqli_query($con, "SELECT * FROM sanpham where sanpham_hot = 1 limit $begin,6 ");

                        ?>
                            <div class="col-9 col-md-12">
                                <div class="box filter-toggle-box">
                                    <button class="btn-flat btn-hover" id="filter-toggle">filter</button>
                                </div>

                                <div class="box">
                                    <div class="row" id="products">
                                        <?php
                                        while ($row_sanphamhot_dm = mysqli_fetch_array($sql_sanphamhot_dm)) {
                                        ?>
                                            <div class="col-4 col-md-6 col-sm-12">

                                                <div class="product-card">
                                                    <div class="product-card-img">
                                                        <a href="?quanly=chitietsanpham&id=<?= $row_sanphamhot_dm['sanpham_id'] ?>">
                                                            <img src="upload/<?= $row_sanphamhot_dm['sanpham_img'] ?>" alt="">
                                                            <img src="upload/<?= $row_sanphamhot_dm['sanpham_img'] ?>" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="product-card-info">
                                                        <div class="product-btn">
                                                            <form action="?quanly=giohang" method="POST">
                                                                <input type="hidden" name="tensanpham" value="<?= $row_sanphamhot_dm['sanpham_name'] ?>">
                                                                <input type="hidden" name="sanpham_id" value="<?= $row_sanphamhot_dm['sanpham_id'] ?>">
                                                                <input type="hidden" name="sanphamgia" value="<?= $row_sanphamhot_dm['sanpham_giakhuyenmai'] ?>">
                                                                <input type="hidden" name="hinhanh" value="<?= $row_sanphamhot_dm['sanpham_img'] ?>">
                                                                <input type="hidden" name="soluong" value="1">
                                                                <input type="submit" name="themgiohang" class="btn-flat btn-hover" value="Thêm giỏ hàng">
                                                            </form>
                                                            <a href="?quanly=chitietsanpham&id=<?= $row_sanphamhot_dm['sanpham_id'] ?>" class="btn-flat btn-hover btn-shop-now"><i class='bx bx-search-alt'></i></a>
                                                            <button class="btn-flat btn-hover btn-cart-add">
                                                                <i class='bx bxs-heart'></i>
                                                            </button>
                                                        </div>
                                                        <div class="product-card-name">
                                                            <?= $row_sanphamhot_dm['sanpham_name'] ?>
                                                        </div>
                                                        <div class="product-card-price">
                                                            <span><del>
                                                                    <?php

                                                                    if ($row_sanphamhot_dm['sanpham_gia'] == 0) {
                                                                        echo '';
                                                                    } else {
                                                                        $giagiam =  number_format($row_sanphamhot_dm['sanpham_gia']);
                                                                        echo "$giagiam.<sup>đ</sup>";
                                                                    }
                                                                    ?>
                                                                </del></span> <span class="curr-price"><?php echo number_format($row_sanphamhot_dm['sanpham_giakhuyenmai']) ?><sup>đ</sup></span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        <?php
                                        }

                                        ?>
                                    </div>
                                </div>
                                <div class="box">
                                    <?php
                                    $sql_trang = mysqli_query($con, "SELECT * FROM sanpham where sanpham_hot = 1 ");
                                    $row_count = mysqli_num_rows($sql_trang);
                                    $trang = ceil($row_count / 6);
                                    ?>
                                    <ul class="pagination list_trang">

                                        <?php

                                        for ($i = 1; $i <= $trang; $i++) {
                                        ?>
                                            <li><a href="index.php?quanly=danhmuc&sanphamhot&trang=<?= $i ?>" <?php if ($i == $page) {
                                                                                                                    echo 'class="active"';
                                                                                                                } else {
                                                                                                                    echo '';
                                                                                                                }  ?>><?= $i ?></a>
                                            </li>
                                        <?php
                                        }
                                        ?>

                                    </ul>
                                </div>
                            </div>
                        <?php
                        } else {
                            if (isset($_GET['trang'])) {
                                $page = $_GET['trang'];
                            } else {
                                $page = '';
                            }
                            if ($page == '' || $page == 1) {
                                $begin = 0;
                            } else {
                                $begin = ($page * 6) - 6;
                            }
                            $sql_sanpham_dm = mysqli_query($con, "SELECT * FROM sanpham order by sanpham_id DESC limit $begin,6 ");
                        ?>

                            <div class="col-9 col-md-12">
                                <div class="box filter-toggle-box">
                                    <button class="btn-flat btn-hover" id="filter-toggle">filter</button>
                                </div>
                                <div class="box">
                                    <div class="row" id="products">
                                        <?php
                                        while ($row_sanpham = mysqli_fetch_array($sql_cate)) {
                                        ?>
                                            <div class="col-4 col-md-6 col-sm-12">

                                                <div class="product-card">
                                                    <div class="product-card-img">
                                                        <a href="?quanly=chitietsanpham&id=<?= $row_sanpham['sanpham_id'] ?>">
                                                            <img src="upload/<?= $row_sanpham['sanpham_img'] ?>" alt="">
                                                            <img src="upload/<?= $row_sanpham['sanpham_img'] ?>" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="product-card-info">
                                                        <div class="product-btn">
                                                            <form action="?quanly=giohang" method="POST">
                                                                <input type="hidden" name="tensanpham" value="<?= $row_sanpham['sanpham_name'] ?>">
                                                                <input type="hidden" name="sanpham_id" value="<?= $row_sanpham['sanpham_id'] ?>">
                                                                <input type="hidden" name="sanphamgia" value="<?= $row_sanpham['sanpham_giakhuyenmai'] ?>">
                                                                <input type="hidden" name="hinhanh" value="<?= $row_sanpham['sanpham_img'] ?>">
                                                                <input type="hidden" name="soluong" value="1">
                                                                <input type="submit" name="themgiohang" class="btn-flat btn-hover" value="Thêm giỏ hàng">
                                                            </form>
                                                            <a href="?quanly=chitietsanpham&id=<?= $row_sanpham['sanpham_id'] ?>" class="btn-flat btn-hover btn-shop-now"><i class='bx bx-search-alt'></i></a>

                                                        </div>
                                                        <div class="product-card-name">
                                                            <?= $row_sanpham['sanpham_name'] ?>
                                                        </div>
                                                        <div class="product-card-price">
                                                            <span><del>
                                                                    <?php

                                                                    if ($row_sanpham['sanpham_gia'] == 0) {
                                                                        echo '';
                                                                    } else {
                                                                        $giagiam =  number_format($row_sanpham['sanpham_gia']);
                                                                        echo "$giagiam.<sup>đ</sup>";
                                                                    }
                                                                    ?>
                                                                </del></span> <span class="curr-price"><?php echo number_format($row_sanpham['sanpham_giakhuyenmai']) ?><sup>đ</sup></span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="box">
                                    <?php

                                    if (isset($_GET['id'])) {
                                        $id = $_GET['id'];
                                    } else {
                                        $id = '';
                                    }


                                    $sql_trang = mysqli_query($con, "SELECT * FROM category,sanpham  where category.category_id = sanpham.category_id and sanpham.category_id = '$id' ");
                                    $row_count = mysqli_num_rows($sql_trang);
                                    $trang = ceil($row_count / 6);
                                    ?>
                                    <ul class="pagination list_trang">

                                        <?php

                                        for ($i = 1; $i <= $trang; $i++) {
                                        ?>
                                            <li><a href="?quanly=danhmuc&id=<?= $id ?>&trang=<?= $i ?>" <?php if ($i == $page) {
                                                                                                            echo 'class="active"';
                                                                                                        } else {
                                                                                                            echo '';
                                                                                                        }  ?>><?= $i ?></a>
                                            </li>
                                        <?php
                                        }
                                        ?>

                                    </ul>
                                </div>
                            </div>
                        <?php
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
        <!-- end products content -->