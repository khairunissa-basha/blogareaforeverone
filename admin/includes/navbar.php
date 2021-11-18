<?php include("includes/header.php");?>
<?php
if(isset($_POST['insert'])){
    $File = addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $query = "insert into users(image) values('$file')";
    if(mysqli_query($db_conn, $query)){
        echo  '<script>alert("inserted")</script>';
    }
}
?>

<body>

<nav class="fixed">
    <div class="nav-wrapper">
        <div class="container">
            <a href="" class="brand-logo center">Blogspot</a>
            <a href="" class="button-collapse show-on-large" data-activates="sidenav"><i class="material-icons">menu</i></a>
        </div>
    </div>
</nav>
<ul class="side-nav fixed" id="sidenav">
    <li>
        <div class="user-view">
            <div class="background">
                <img src="../images/img5.jpg" alt=" "  class="responsive">
            </div>
           <a href=""><img src="../images/blank-profile-pic.png" alt="person" class="circle"></a>
           <? /*php
            $query = "select image from users where username = '$username'";
            $result = mysqli_query($db_conn, $query);
            if ($res){
                echo "<img src='data:image/jpeg:base54,'.base64_encode($row['name'])>";
            })*/
            <span class="name blue-text"><?php echo $_SESSION['username']; ?></span>
            <span class="email blue-text"><?php echo $_SESSION['email']; ?></span>
       </div>
    </li>
    <li>
        <a href="dashboard.php">Dashboard</a>
    </li>

    <li>
        <a href="post.php">Posts</a>
    </li>

    <!--<li>
        <a href="../admin/images.php">Images</a>
    </li>-->

    <li>
        <a href="Show_comments.php">Comments</a>
    </li>

    <li>
        <a href="settings.php">Settings</a>
    </li>
    

    <div class="divider">
    
    </div>
    <li>
        <a href="logout.php">Logout</a>
    </li>
</ul>