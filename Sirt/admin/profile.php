<?php include "includes/admin_header.php" ?>

    <div id="wrapper">
    <script>
    document.getElementsByTagName('body')[0].style.display="block";
    </script>
        <!-- Navigation -->
<?php include "includes/admin_navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                              Welcome to Your Profile 
                            <small>You Can Edit Your Profile Here</small>
                        </h1>

                  <?php 

                  if(isset($_COOKIE['username'])){
                      $username1 =  $_COOKIE['username'];
                  }
                     
                
                    $user_query = "SELECT * FROM user where user_username ='{$username1}'";
                    $user_query_result  =mysqli_query($con,$user_query);
                    while($row = mysqli_fetch_assoc($user_query_result)){
                        
                    $user_username = $row['user_username'];
                    $user_name = $row['user_name'];
                    $user_email = $row['user_email'];
                    $user_phone = $row['user_phone'];
                    $user_pass = $row['user_pass'];
                    $user_img = $row['user_img'];
                    
                    }

?>      
   <?php 


    if(isset($_POST['edit_user'])){
        
            $user_name      = $_POST['user_name'];
            $user_email     = $_POST['user_email'];
            $user_phone  = $_POST['user_phone'];
            $user_image = $_FILES['image_file']['name'];
        
          if(!empty($user_image)){
            $user_image_temp = $_FILES['image_file']['tmp_name'];   
            $ext = explode('.',$user_image);
            $image_name = $_COOKIE['username'] . $ext[0] .'.'. $ext[1];
            $path = "../images/" . $image_name ;
            move_uploaded_file($user_image_temp ,$path);
              
             $query = "UPDATE user SET ";
                $query .= "user_name = '{$user_name}', ";
                $query .= "user_email = '{$user_email}', ";
                $query .= "user_phone= '{$user_phone}', ";
                $query .= "user_img = '{$path}'";
                $query .= "where user_username = '{$username1}' ";

                    $update_user =mysqli_query($con,$query);
        
                    if(!$update_user){
                        echo mysqli_error($con);
                    }
          }
         
         if(empty($user_image)){
        $query = "UPDATE user SET ";
        $query .= "user_name = '{$user_name}', ";
        $query .= "user_email = '{$user_email}', ";
        $query .= "user_phone= '{$user_phone}' ";
        $query .= "where user_username = '{$username1}' ";

        $update_user =mysqli_query($con,$query);
         }
            


        
        
                  echo "<h2 style='color:green'>{$user_name} Your Profile Has Been Updated.</h2>";
                  ?>
                  <script>
                  setTimeout(function(){
                      window.location='profile.php';
                  },500);      
                  </script>
                  
                  <?php
          
    }
  ?>
   
   

   <form action="" method="post" enctype="multipart/form-data">

       <div class="form-group">
        <label for="title">Mine Username</label>
        <input type="text"  value="<?php echo $user_username;?>" class="form-control" name="user_username" required readonly='true'>
    </div>
    
    <div class="form-group">
        <label for="post_status">My Name</label>
        <input type="text" value="<?php echo $user_name;?>" class="form-control" name="user_name" required>
    </div>
   
    <div class="form-group">
        <label for="post_tags">My Email</label>
        <input type="email"  value="<?php echo $user_email;?>" class="form-control" name="user_email" required>
    </div>
         
    <div class="form-group">
        <label for="post_tags">My Phone Number</label>
        <input type="text"  value="<?php echo $user_phone;?>" class="form-control" name="user_phone">
    </div>
      
       
    <div class="form-group">
        <label for="post_content">My Profile Picture</label><br>
        <img src="../images/<?php echo $user_img;?>" style="height: 100px;border-radius: 40px;">
    </div>
    <label class="btn-bs-file btn btn-lg btn-success" style="background-color: #2196F3;border-radius: 3px;padding: 10px;">
                                Change Your Profile Pic
                                <input type="file" name='image_file' accept="image/*"/>
                                </label><br><br><br><br>
    
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="edit_user" value="Update Profile">
    </div>
</form>
            </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
     
<?php include "includes/admin_footer.php" ?>
