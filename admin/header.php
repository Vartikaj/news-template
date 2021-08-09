<?php
//THESE LINE OF CODE IS FOR CHECKING THAT THE SESSION HAVING ANY VALID LOGIN USER DETAILS OR NOT
    session_start();
    if(!isset($_SESSION['username']))
    {
        header("location:index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>ADMIN Panel</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="../css/bootstrap.min.css" />
        <!-- Font Awesome Icon -->
        <link rel="stylesheet" href="../css/font-awesome.css">
        <!-- Custom stlylesheet -->
        <link rel="stylesheet" href="../css/style.css">
    </head>
    <body>
        <!-- HEADER -->
        <div id="header-admin">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->
                    <div class="col-md-2" class="logo">
                    <?php
                        include "config.php";
                        $sql = "SELECT * FROM settings";
                        $data = mysqli_query($con,$sql) or die("Query failed".mysqli_error($con));
                        if(mysqli_num_rows($data) > 0){
                            while($row = mysqli_fetch_assoc($data)){
                                if($row['logo'] == ""){
                                    echo '<a href="index.php">'.$row['websitename'].'</a>';
                                }else{
                                    echo '<a href="index.php"><img class="logo" src="images/'.$row['logo'].'"></a>';
                                }
                            }
                        }
                        ?>
                    </div>
                    <!-- /LOGO -->
                      <!-- LOGO-Out -->
                    <div class="col-md-offset-8 col-md-2">
                        <a class="admin-logout">Hello <?php echo $_SESSION['username'];?></a><br/><a href="logout.php" class="admin-logout" > logout</a>
                    </div>
                    <!-- /LOGO-Out -->
                </div>
            </div>
        </div>
        <!-- /HEADER -->
        <!-- Menu Bar -->
        <div id="admin-menubar">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                       <ul class="admin-menu">
                            <li>
                                <a href="post.php">Post</a>
                            </li>
                            
                            <?php
                                /**THIS CODE IS USED FOR WHEN WE WANT TO SHOW THESE MENU WHEN THE 
                                  *USER IS ADMIN*/
                                if($_SESSION['user_role'] == '1'){
                            ?>
                            <li>
                                <a href="category.php">Category</a>
                            </li>
                            <li>
                                <a href="users.php">Users</a>
                            </li>
                            <li>
                                <a href="settings.php">settings</a>
                            </li>
                            <?php
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Menu Bar -->
