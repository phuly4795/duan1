<?php
if (isset($_POST['search_button'])) {


    $tukhoa = $_POST['search_product'];

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



    $sql_product = mysqli_query($con, "SELECT * FROM sanpham  where sanpham_name like '%$tukhoa%'  order by sanpham_id DESC limit $begin,6 ");
}
?>
<!-- products content -->
<div class="bg-main">
    <div class="container">
        <div class="box">
            <div class="breadcumb">
                <a href="index.php">Trang chủ</a>
                <span><i class='bx bxs-chevrons-right'></i></span>
                Tìm kiếm
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

                </div>

                <div class="col-9 col-md-12">
                    <div class="box filter-toggle-box">
                        <button class="btn-flat btn-hover" id="filter-toggle">filter</button>
                    </div>

                    <div class="box">
                        <div class="row" id="products">
                            <?php
                            while ($row_sanpham = mysqli_fetch_array($sql_product)) {
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
                                                    </del></span>
                                                <span class="curr-price"><?php echo number_format($row_sanpham['sanpham_giakhuyenmai']) ?><sup>đ</sup></span>
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

                

                        $sql_trang = mysqli_query($con, "SELECT * FROM sanpham  where sanpham_name like '%$tukhoa%'");
                        $row_count = mysqli_num_rows($sql_trang);
                        $trang = ceil($row_count / 6);
                        ?>
                        <ul class="pagination list_trang">

                            <?php

                            for ($i = 1; $i <= $trang; $i++) {
                            ?>
                                <li><a href="?quanly=timkiem&trang=<?= $i ?>" <?php if ($i == $page) {
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

            </div>
        </div>
    </div>
</div>
<!-- end products content -->