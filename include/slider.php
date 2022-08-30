    <!-- hero section -->
    <div class="hero">
        <div class="slider">
            <div class="container">
                <!-- slide item -->
                <div class="slide active">
                    <div class="info">
                        <div class="info-content">
                            <h3 class="top-down">
                                Samsung Galaxy Z Flip3 5G 128GB
                            </h3>
                            <h2 class="top-down trans-delay-0-2">
                                SamSung
                            </h2>
                            <p class="top-down trans-delay-0-4">
                                Một Biểu Tượng Thời Trang, Một Kiệt Tác Của Thế Giới Công Nghệ Mà Ai Cũng Phải Kinh Ngạc Khi Nhìn Thấy Samsung Galaxy Z Flip3 5G Và Cách Mà Bạn Sử Dụng Siêu Phẩm Smartphone Này, Nơi Công Nghệ Điện Thoại Màn Hình Gập Đã Mang Đến Những Điều Không Tưởng. </p>
                            <div class="top-down trans-delay-0-6">
                                <a href="?quanly=chitietsanpham&id=32">
                                    <button class="btn-flat btn-hover">
                                        <span>Xem ngay</span>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="img top-down" style="margin-top: 3%;">
                        <img src="./upload/samsung-galaxy-z-flip-3-violet-1-600x600.JPG" alt="">
                    </div>
                </div>
                <!-- end slide item -->
                <!-- slide item -->
                <div class="slide">
                    <div class="info">
                        <div class="info-content">
                            <h3 class="top-down">
                                Tai nghe Airpods Pro 2021
                            </h3>
                            <h2 class="top-down trans-delay-0-2">
                                Apple
                            </h2>
                            <p class="top-down trans-delay-0-4">
                                AirPods Pro 2021 Sẽ Giúp Bạn Cảm Nhận Trọn Vẹn Những Giá Trị Làm Nên Tên Tuổi Của Dòng Tai Nghe Apple Như Sự Tinh Xảo, Độ Nhỏ Gọn Và Tính Đa Dụng Thông Qua Hộp Sạc Đặc Trưng </p>
                            <div class="top-down trans-delay-0-6">
                                <a href="?quanly=chitietsanpham&id=28">
                                    <button class="btn-flat btn-hover">
                                        <span>Xem ngay</span>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="img right-left">
                        <img src="./upload/TaingheAirPodsPro.jpg" alt="">
                    </div>
                </div>
                <!-- end slide item -->
                <!-- slide item -->
                <div class="slide">
                    <div class="info">
                        <div class="info-content">
                            <h3 class="top-down">
                                Đồng hồ Xiaomi Mi Watch Lite
                            </h3>
                            <h2 class="top-down trans-delay-0-2">
                                Xiaomi
                            </h2>
                            <p class="top-down trans-delay-0-4">
                                Chiếc Đồng Hồ Thời Trang, Màn Hình Màu Đẹp Rực Rỡ, Chống Nước Và Loạt Tính Năng Theo Dõi Sức Khỏe Ấn Tượng, Xiaomi Mi Watch Lite Là Sản Phẩm Công Nghệ Tuyệt Vời Trong Mức Giá Rẻ Đến Bất Ngờ. </p>
                            <div class="top-down trans-delay-0-6">
                                <a href="?quanly=chitietsanpham&id=3">
                                    <button class="btn-flat btn-hover">
                                        <span>Xem ngay</span>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="img left-right">
                        <img src="./upload/dh2.jpg" alt="">
                    </div>
                </div>
                <!-- end slide item -->
            </div>
            <!-- slider controller -->
            <button class="slide-controll slide-next">
                <i class='bx bxs-chevron-right'></i>
            </button>
            <button class="slide-controll slide-prev">
                <i class='bx bxs-chevron-left'></i>
            </button>
            <!-- end slider controller -->
        </div>
    </div>
    <!-- end hero section -->
    <!-- promotion section -->
    <div class="promotion">
        <div class="row">
            <?php
            $sql_promotion = mysqli_query($con, 'SELECT * FROM category order by category_id ASC limit 3');
            while ($row_promotion = mysqli_fetch_array($sql_promotion)) {
            ?>
                <div class="col-4 col-md-12 col-sm-12">
                    <div class="promotion-box">
                        <div class="text">
                            <h3><?= $row_promotion['category_name'] ?></h3>
                            <a class="btn-flat btn-hover" href="index.php?quanly=danhmuc&id=<?= $row_promotion['category_id'] ?>"><span>Xem ngay</span></a>
                        </div>
                        <img src="upload/<?= $row_promotion['category_img'] ?>" alt="">
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
    <!-- end promotion section -->