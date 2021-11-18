<?php include("includes/navbar.php");

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $id=mysqli_real_escape_string($db_conn, $id);
    $id=htmlentities($id);
    $sql="select * from post where id=$id";
    $res=mysqli_query($db_conn,$sql);
    if(mysqli_num_rows($res)>0){
        $row=mysqli_fetch_assoc($res);

        ?>
        <div class="main">
        <form action="edit_check.php?id=<?php echo $id;?>" method="POST" enctype="multipart/form-data">
    <div class="card-panel">
        <?php
        
        if(isset($_SESSION['message'])){
            echo $_SESSION['message'];
            unset ($_SESSION['message']);
        }
        ?>
       
        <h5>TITLE</h5>
        <!--<input type="text" name="title" placeholder=" <?//php echo $row['title'];?>">-->
        <textarea class="materialize-textarea" name="title" placeholder="title for post">
            <?php echo $row['title'];?>
        </textarea>
        <h5>Post Content</h5>
<textarea name="ckeditor" class="ckeditor"><?php echo $row['content'];?></textarea>
</div>
<div class="center">
<input type="submit" class="btn white-text" name="edit" value="update">
</div>
</form>
        </div>
        <?php
    }else{
        header("Location:dashboard.php");
    }
}
include ("includes/footer.php")
?>