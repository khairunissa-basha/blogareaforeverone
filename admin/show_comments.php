<?php include("includes/navbar.php");?>

<div class="main">
<div class="row">

<!--recent comments--->
<div class="col l12 m12 s12">
<ul class="collection with-header">
<li class="collection-header red lighten-2">
<h5 class="white-text">Recent Comments</h5>
</li>
<span id="message1"></span>
<?php
$sql1="select * from comments order by id DESC";

$res1=mysqli_query($db_conn,$sql1);

    
    if(mysqli_num_rows($res1)>0){
        while($row1=mysqli_fetch_assoc($res1)){
            ?>
            <li class="collection-item">
<?php echo $row1['comment']; ?>
<?php echo $row1['id'];?>
<br>
<span><a href="" class="approve" id="<?php echo $row1['id']; ?>"><i class="material-icons tiny green-text">done</i>Approve</a>| <a href="" class="deletecomment" id=<?php echo $row1['id']; ?>><i class="material-icons tiny red-text">clear</i>Remove</a></span>
</li>
            <?php
        }
    }else{
        echo "no comments";
    }


?>
</ul>
</div>
</div>
</div>

<!---approve comment-->
<script>
  
    const approve = document.querySelectorAll(".approve");
    approve.forEach(function(item,index)
    {
    item.addEventListener('click',approveNow)
    })
    function approveNow(e){
     
        e.preventDefault();
        if(confirm("do you really want to approve it")){
        
            const xhr = new XMLHttpRequest();
            xhr.open("GET", "approve.php?id="+Number(e.target.id),true)
            xhr.onload=function(){
                const msg=xhr.responseText;
                const message=document.getElementById('message1');
                message.innerHTML=msg;
            }
            xhr.send()
        }
    }
    </script>


<!-- delete comment--->-
<script>
            
            const delcomment=document.querySelectorAll('.deletecomment');
            delcomment.forEach(function(item,index)
            {
                confirm("Do you really want to remove it");
                item.addEventListener('click',deletecommentNow)
            })

            function deletecommentNow(e){
                e.preventDefault();
                if(confirm("Do you really want to remove it")){
                    const xhr = new XMLHttpRequest();
                    xhr.open("GET","delete_comment.php?id=".+Number(e.target.id),ture)
                    xhr.onload=function(){
                        const msg = xhr.responsetext;
                        const message=document.getElementById('message1');
                        message.innerHTML=msg;
                    }
                    xhr.send();
                }
            }
            </script>
