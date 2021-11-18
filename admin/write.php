<?php ;
include ("includes/navbar.php");
if(isset($_SESSION['username'])){
    $username=$_SESSION['username'];
?>
<div class="main">
    <div class="cardpanel">
    <?php if(isset($_SESSION['message'])){
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }?>
    </div>

<!--<form action="write_check.php?username=<?php echo $username;?>" method="POST" enctype="multipart/form-data">-->
<form action="write_check.php" method="POST" enctype="multipart/form-data">
    <div class="card-panel">
       
        <h5>TITLE</h5>
        <input type="text" name="title" placeholder="title">
        <h5>Featue Image</h5>
        <div class="input-field file-field">
            <div class='btn'>
                UPLOAD
                <input type="file" name="image">
    </div>
    <div class="file-path-wrapper">
        <input type="text" class="file-path">
    </div>

    </div>
        <h5>Post Content</h5>
<textarea name="ckeditor" class="ckeditor"></textarea>
</div>
<div class="center">
<input type="submit" class="btn white-text" name="publish" value="Publish">

</div>
</form>
</div>
<?php include("includes/footer.php");
}
else{
    echo"<div class='chip red white-text'>Login to continue</div>";
    header("Location:login.php");
}?>         