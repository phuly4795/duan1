<?php
if (isset($_GET['id_tin'])) {
    $id_baiviet = $_GET['id_tin'];
} else {
    $id_baiviet = '';
}
?>
<div class="tintuc" >

    <div class="bg-second">
        <div class="section container">

            <?php


            $sql_baiviet = mysqli_query($con, "SELECT * FROM baiviet where baiviet_id = '$id_baiviet'");
            $row_baiviet = mysqli_fetch_array($sql_baiviet)
            ?>
            <div class="row" style="margin-left: 30%    ; width:100%">

                <div class="col-7 col-md-8">
                    <div class="sp-item-info"> 
                        <div class="sp-item-name" style="text-align: center;"><?= $row_baiviet['tenbaiviet'] ?></div>
                        <h4 class="sp-item-description" style="text-align: center;">
                            <?= $row_baiviet['tomtat'] ?>
                        </h4>
                        <p style="text-align: center;">  <?= $row_baiviet['noidung'] ?></p>
                    </div>
                </div>
            </div>

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