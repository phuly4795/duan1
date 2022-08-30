<!-- product list -->
<div class="section">
    <div class="container">
        <div class="section-header">
            <h2>Sản phẩm mới nhất</h2>
        </div>

        <div class="row" id="latest-products">
            <?php
            $sql_product = mysqli_query($con, 'SELECT * FROM sanpham where sanpham_active = 0 order by sanpham_id DESC limit 4');
            while ($row_sanphammoi = mysqli_fetch_array($sql_product)) {
            ?>
                <div class="col-3 col-md-6 col-sm-12">
                    <div class="product-card">
                        <div class="product-card-img">
                            <a href="?quanly=chitietsanpham&id=<?= $row_sanphammoi['sanpham_id'] ?>">
                                <img src="upload/<?= $row_sanphammoi['sanpham_img'] ?>" alt="">
                                <img src="upload/<?= $row_sanphammoi['sanpham_img'] ?>" alt="">
                            </a>

                        </div>
                        <div class="product-card-info">
                            <div class="product-btn">
                                <form action="?quanly=giohang" method="POST">
                                    <input type="hidden" name="tensanpham" value="<?= $row_sanphammoi['sanpham_name'] ?>">
                                    <input type="hidden" name="sanpham_id" value="<?= $row_sanphammoi['sanpham_id'] ?>">
                                    <input type="hidden" name="sanphamgia" value="<?= $row_sanphammoi['sanpham_giakhuyenmai'] ?>">
                                    <input type="hidden" name="hinhanh" value="<?= $row_sanphammoi['sanpham_img'] ?>">
                                    <input type="hidden" name="soluong" value="1">
                                    <input type="submit" name="themgiohang" class="btn-flat btn-hover" value="Thêm giỏ hàng">
                                </form>
                                <a class="btn-flat btn-hover btn-shop-now" href="?quanly=chitietsanpham&id=<?= $row_sanphammoi['sanpham_id'] ?>"><i class='bx bx-search-alt'></i></a>
                            </div>
                            <div class="product-card-name">
                                <?= $row_sanphammoi['sanpham_name'] ?>
                            </div>
                            <div class="product-card-price">
                            <span><del>
                                    <?php 
                                   
                                    if($row_sanphammoi['sanpham_gia'] == 0){
                                        echo '';
                                       
                                    }else{
                                        $giagiam =  number_format($row_sanphammoi['sanpham_gia']);
                                        echo "$giagiam.<sup>đ</sup>";
                                    }
                                    ?>
                                </del></span>
                                <span class="curr-price"><?php echo number_format($row_sanphammoi['sanpham_giakhuyenmai']) ?><sup>đ</sup></span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>

        <div class="section-footer">
            <a href="index.php?quanly=danhmuc&sanphammoi" class="btn-flat btn-hover">Xem tất cả</a>
        </div>

    </div>
</div>
<!-- end product list -->

<!-- special product -->
<div class="bg-second">
    <div class="section container">
        <div class="row">
            <div class="col-4 col-md-4">
                <div class="sp-item-img">
                    <img src="./upload/dt3.jpg" alt="">
                </div>
            </div>
            <div class="col-7 col-md-8">
                <div class="sp-item-info">
                    <div class="sp-item-name">Điện thoại OPPO Find X3 Pro</div>
                    <p class="sp-item-description">
                    Sẵn sàng cùng bạn hướng tới tương lai với OPPO Find X3 Pro 5G, chiếc điện thoại sở hữu camera màu sắc trung thực, màn hình 120Hz siêu mượt, 1 tỷ màu sống động và hiệu năng đột phá với sức mạnh của con chip Qualcomm Snapdragon 888 hỗ trợ 5G.                    </p>
                    <a href="?quanly=chitietsanpham&id=33"><button class="btn-flat btn-hover">Xem ngay</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end special product -->

<!-- product list -->
<div class="section">
    <div class="container">
        <div class="section-header">
            <h2>Sản phẩm Hot</h2>
        </div>
        <div class="row" id="best-products">
            <?php
            $sql_product_hot = mysqli_query($con, 'SELECT * FROM sanpham  where sanpham_hot = 1   order by sanpham_id DESC limit 4');
            while ($row_sanpham_hot = mysqli_fetch_array($sql_product_hot)) {
            ?>
                <div class="col-3 col-md-6 col-sm-12">
                    <div class="product-card">
                        <div class="product-card-img">
                            <a href="?quanly=chitietsanpham&id=<?= $row_sanpham_hot['sanpham_id'] ?>">
                                <img src="upload/<?= $row_sanpham_hot['sanpham_img'] ?>" alt="">
                                <img src="upload/<?= $row_sanpham_hot['sanpham_img'] ?>" alt="">
                            </a>
                        </div>
                        <div class="product-card-info">
                            <div class="product-btn">
                                <form action="?quanly=giohang" method="POST">
                                    <input type="hidden" name="tensanpham" value="<?= $row_sanpham_hot['sanpham_name'] ?>">
                                    <input type="hidden" name="sanpham_id" value="<?= $row_sanpham_hot['sanpham_id'] ?>">
                                    <input type="hidden" name="sanphamgia" value="<?= $row_sanpham_hot['sanpham_giakhuyenmai'] ?>">
                                    <input type="hidden" name="hinhanh" value="<?= $row_sanpham_hot['sanpham_img'] ?>">
                                    <input type="hidden" name="soluong" value="1">
                                    <input type="submit" name="themgiohang" class="btn-flat btn-hover" value="Thêm giỏ hàng">
                                </form>
                                <a class="btn-flat btn-hover btn-shop-now" href="?quanly=chitietsanpham&id=<?= $row_sanpham_hot['sanpham_id'] ?>"><i class='bx bx-search-alt'></i></a>

                            </div>
                            <div class="product-card-name">
                                <?= $row_sanpham_hot['sanpham_name'] ?>
                            </div>
                            <div class="product-card-price">
                           
                                <span><del>
                                    <?php 
                                   
                                    if($row_sanpham_hot['sanpham_gia'] == 0){
                                        echo '';
                                       
                                    }else{
                                        $giagiam =  number_format($row_sanpham_hot['sanpham_gia']);
                                        echo "$giagiam.<sup>đ</sup>";
                                    }
                                    ?>
                                </del></span>
                                <span class="curr-price"><?php echo number_format($row_sanpham_hot['sanpham_giakhuyenmai']) ?><sup>đ</sup></span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <div class="section-footer">
            <a href="index.php?quanly=danhmuc&sanphamhot" class="btn-flat btn-hover">Xem tất cả</a>
        </div>
    </div>
</div>
<!-- end product list -->