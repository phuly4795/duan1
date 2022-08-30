

    <!-- footer -->
    <footer class="bg-second">
        <div class="container">
            <div class="row">
                <div class="col-3 col-md-6">
                <?php
            $sql_product_footer = mysqli_query($con, 'SELECT * FROM sanpham  order by sanpham_id DESC limit 4');
           
            ?>
                    <h3 class="footer-head">Sản phẩm</h3>
                    <ul class="menu">
                        <?php
                         while ($row_sanpham_footer = mysqli_fetch_array($sql_product_footer)) {
                        ?>
                        <li><a href="?quanly=chitietsanpham&id=<?= $row_sanpham_footer['sanpham_id'] ?>"><?=$row_sanpham_footer['sanpham_name']?></a></li>
                      <?php
                         }
                      ?>
                    </ul>
                </div>
                <div class="col-3 col-md-6">
                    <h3 class="footer-head">Dịch vụ</h3>
                    <ul class="menu">
                        <li><a href="?quanly=mybill">Trạng thái đơn hàng</a></li>
                        <li><a href="?quanly=profile">Tài khoản của tôi</a></li>
                        <li><a href="?quanly=giohang">Giỏ hàng</a></li>
                        <li><a href="?quanly=tintuc&all">Tin tức</a></li>
                       
                    </ul>
                </div>
                <div class="col-3 col-md-6">
                    <h3 class="footer-head">Hỗ trợ</h3>
                    <ul class="menu">
                        <li><a href="#">Mua hàng bị lỗi</a></li>
                        <li><a href="#">Cách thức mua hàng</a></li>
                        <li><a href="#">Cách đổi mật khẩu</a></li>
                    
                       
                    </ul>
                </div>
                <div class="col-3 col-md-6 col-sm-12">
                    <div class="contact">
                        <h3 class="contact-header">
                            TPShop
                        </h3>
                        <ul class="contact-socials">
                            <li><a href="#">
                                    <i class='bx bxl-facebook-circle'></i>
                                </a></li>
                            <li><a href="#">
                                    <i class='bx bxl-instagram-alt'></i>
                                </a></li>
                            <li><a href="#">
                                    <i class='bx bxl-youtube'></i>
                                </a></li>
                            <li><a href="#">
                                    <i class='bx bxl-twitter'></i>
                                </a></li>
                        </ul>
                    </div>
                    
                </div>
            </div>
        </div>
    </footer>
    <!-- end footer -->