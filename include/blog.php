 <!-- blogs -->
 <div class="section">
     <div class="container">

         <div class="section-header">
             <h2>tin tức mới nhất</h2>
         </div>

         <?php
            $sql_tintuc_home = mysqli_query($con, "SELECT * FROM baiviet order by baiviet_id ASC limit 1");
            ?>
         <?php
            while($row_tintuc_home = mysqli_fetch_array($sql_tintuc_home)){
            ?>
             <div class="blog">
                 <div class="blog-img">
                     <img src="./upload/<?=$row_tintuc_home['baiviet_img']?>" alt="321">
                 </div>
                 <div class="blog-info">
                     <div class="blog-title">
                     <?=$row_tintuc_home['tenbaiviet']?>
                     </div>
                     <div class="blog-preview">
                     <?=$row_tintuc_home['tomtat']?>
                     </div>
                     <a href="?quanly=chitiettin&id_tin=<?=$row_tintuc_home['baiviet_id']?>" class="btn-flat btn-hover">Xem chi tiết</a>

                 </div>
             </div>

         <?php
            }
            ?>

<?php
            $sql_tintuc_home = mysqli_query($con, "SELECT * FROM baiviet order by baiviet_id DESC limit 1");
            ?>
         <?php
            while($row_tintuc_home = mysqli_fetch_array($sql_tintuc_home)){
            ?>    
         <div class="blog row-revere">
         <div class="blog-img">
                     <img src="./upload/<?=$row_tintuc_home['baiviet_img']?>" alt="321">
                 </div>
                 <div class="blog-info">
                     <div class="blog-title">
                     <?=$row_tintuc_home['tenbaiviet']?>
                     </div>
                     <div class="blog-preview">
                     <?=$row_tintuc_home['tomtat']?>
                     </div>
                     <a href="?quanly=chitiettin&id_tin=<?=$row_tintuc_home['baiviet_id']?>" class="btn-flat btn-hover">Xem chi tiết</a>

             </div>
         </div>
         <?php
            }
            ?>
         <div class="section-footer">
             <a href="?quanly=tintuc&all" class="btn-flat btn-hover">Xem tất cả</a>
         </div>

     </div>
 </div>
 <!-- end blogs -->