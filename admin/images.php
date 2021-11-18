<?php
include("includes/navbar.php");
if(isset($_SESSION['username'])){
//header<?php


$dir="../images";
$files=scandir($dir);
if($files){
?>
<div class="main">
    <div class="row">
    
    <?php
    foreach($files as $file){
        if(strlen($file)>2){
        ?>
    <div class="col l2 m3 s6">
        <div class="card">
     
    <div class="card-image">
    
    <img src="../images/<?php echo $file; ?>" alt="" style="width:200px; height:150px;">
    <span class="card-title"><?php echo $file; ?></span>
    
        </div>
        </div>
        </div>
       
    
    <?php }
    }?>
   
</div>
</div>
<?php
}
}else{
    header("Location:Login.php");
}

?>