<?php 
    session_start();    
    include_once ('../db/conn.php')
    
?>
<style>
    .d-flex .btn-outline-success{
        background-color:#D26E4B  !important;
        color: white;
        border: none;
    }
    .d-flex .btn:hover{
        background-color:  #A8583C;
    }
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>

  <div class="bl">
        <ul class="list-group">
         
            <div class="alert alert-primary" role="alert"><h4>Bình luận về sản phẩm: </h4></div>      
                <table class="table">
                    <?php 
                     
               
                    ?>
                </table>
        </ul>
    </div>
    <div class="obl">
        <form class="d-flex" action="<?=$_SERVER['PHP_SELF'] ?>" method="POST">
            <input type="hidden" name="idpro" >
         
  
          
        </form>
     
    </div>
    


</body>
</html>