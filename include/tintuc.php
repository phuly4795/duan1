   <div class="tintuc">
       <div class="section-header">
           <h2>Tin tức</h2>
       </div>

       <div class="bg-second">
           <div class="section container">

               <?php
                if (isset($_GET['id_tin'])) {
                    $id_danhmuc = $_GET['id_tin'];
                } else {
                    $id_danhmuc = '';
                }

                $sql_baiviet = mysqli_query($con, "SELECT * FROM danhmuc_tintuc,baiviet 
            where danhmuc_tintuc.danhmuctin_id = baiviet.danhmuctin_id AND danhmuc_tintuc.danhmuctin_id = '$id_danhmuc'");
                while ($row_baiviet = mysqli_fetch_array($sql_baiviet)) {
                ?>
                   <div class="row">
                       <div class="col-4 col-md-4">
                           <div class="sp-item-img">
                               <img src="./upload/<?=$row_baiviet['baiviet_img']?>" alt="">
                           </div>
                       </div>
                       <div class="col-7 col-md-8">
                           <div class="sp-item-info">
                               <div class="sp-item-name"><?=$row_baiviet['tenbaiviet']?></div>
                               <p class="sp-item-description">
                               <?=$row_baiviet['tomtat']?>
                               </p>
                              <a href="?quanly=chitiettin&id_tin=<?=$row_baiviet['baiviet_id']?>" class="btn-flat btn-hover">Xem chi tiết</a>
                           </div>
                       </div>
                   </div>
               <?php
                }
                ?>

                <?php
                    if(isset($_GET['all'])){
                        $sql_baiviet = mysqli_query($con, "SELECT * FROM baiviet order by baiviet_id DESC");
                            while ($row_baiviet = mysqli_fetch_array($sql_baiviet)) {
                            ?>
                      
                         <div class="row">
                       <div class="col-4 col-md-4">
                           <div class="sp-item-img">
                               <img src="./upload/<?=$row_baiviet['baiviet_img']?>" alt="">
                           </div>
                       </div>
                       <div class="col-7 col-md-8">
                           <div class="sp-item-info">
                               <div class="sp-item-name"><?=$row_baiviet['tenbaiviet']?></div>
                               <p class="sp-item-description">
                               <?=$row_baiviet['tomtat']?>
                               </p>
                              <a href="?quanly=chitiettin&id_tin=<?=$row_baiviet['baiviet_id']?>" class="btn-flat btn-hover">Xem chi tiết</a>
                           </div>
                       </div>
                       <hr>
                   </div>
                             <?php
                      }  }
                ?>
           </div>
       </div>

   </div>

   <style>
       .tintuc {
           margin-bottom: 5%;
       }

       .bg-second .section {
           margin: 4% 4% 0 0;
       }
   </style>