<?php include "header.php"; 
require("config.php"); 
    // THIS CODE IS FOR WHEN WE WANT TO PREVENT THAT PAGE IS NOT OPEN BY NORMAL USER.
    if($_SESSION['user_role'] == '0')
    {
        header('location:post.php');
    }
?>
<div id="admin-content">
  <div class="container">
  <div class="row">
    <div class="col-md-12">
        <h1 class="admin-heading">Update Site Settings</h1>
    </div>
    <div class="col-md-offset-3 col-md-6">
    <?php
        $sql1 = "SELECT * FROM settings";
        $data1 = mysqli_query($con,$sql1) or die("Query failed".mysqli_error());
        if(mysqli_num_rows($data1) > 0){
            while($row = mysqli_fetch_assoc($data1)){
    ?>
        <!-- Form for show edit-->
        <form action="save-settings.php" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="form-group">
                <label for="logo">Website Name</label>
                <input type="text" name="website_name" class="form-control" value="<?php echo $row['websitename'];?>">
            </div>
            <div class="form-group">
                <label for="">Website Logo</label>
                <input type="file" name="new-image">
                <img  src="images/<?php echo $row['logo'];?>" height="100px">
                <input type="hidden" name="old-image" value="<?php echo $row['logo']; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1"> Footer description</label>
                <textarea name="footerdesc" class="form-control" required rows="5"><?php echo $row['footerdes'];?></textarea>
            </div>
            <input type="submit" name="submit" class="btn btn-primary" value="Update" />
        </form>
        <?php
            }
            }else{
                echo "there is an issue";
            }
        ?>
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>
