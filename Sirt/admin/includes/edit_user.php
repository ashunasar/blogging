<?php 

                  if(isset($_GET['user_id'])){
                      $the_user_id =  $_GET['user_id'];
                  }
                     
                
                    $user_query = "SELECT * FROM users where user_id ={$the_user_id}";
                    $user_query_result  =mysqli_query($con,$user_query);
                    while($row = mysqli_fetch_assoc($user_query_result)){
                    $user_firstname = $row['user_firstname'];
                    $user_lastname = $row['user_lastname'];
                    $user_role = $row['user_role'];
                    $user_email = $row['user_email'];
                    $username = $row['username'];
                    $user_password = $row['user_password'];
                    }

?>   
   
   <?php 


    if(isset($_POST['edit_user'])){
        
            $user_firstname = $_POST['user_firstname'];
            $user_lastname  = $_POST['user_lastname'];
            $user_role      = $_POST['user_role'];
            $user_email     = $_POST['user_email'];
            $username       = $_POST['username'];
            $user_password  = $_POST['user_password'];
        
        

//        move_uploaded_file($post_image_temp ,"../images/$post_image");
//          if(empty($post_image)){
//              
//              $img_query = " select * from posts where post_id = '{$the_post_id}' ";
//              $img_query_result = mysqli_query($con, $img_query);
//              
//              while($row = mysqli_fetch_assoc($img_query_result)){
//                  $post_image = $row['post_image'];
//              }
//          }

                $query = "UPDATE users SET ";
                $query .= "user_firstname = '{$user_firstname}', ";
                $query .= "user_lastname = '{$user_lastname}', ";
                $query .= "user_role  = '{$user_role}', ";
                $query .= "user_email = '{$user_email}', ";
                $query .= "username = '{$username}', ";
                $query .= "user_password = '{$user_password}' ";
                $query .= "where user_id = '{$the_user_id}' ";

                    $update_user =mysqli_query($con,$query);

                        if(!$update_user){
                            die("error "  . mysqli_error($con) );
                        }
                echo "<h2 style='color:green'>User Succesfully Updated</h2>";

                    }



  ?>
   
   

   <form action="" method="post" enctype="multipart/form-data">

       <div class="form-group">
        <label for="title">Firstname</label>
        <input type="text" value="<?php echo $user_firstname;?>" class="form-control" name="user_firstname" required>
    </div>
    
    <div class="form-group">
        <label for="post_status">Lastname</label>
        <input type="text" value="<?php echo $user_lastname;?>" class="form-control" name="user_lastname" required>
    </div>
   
    
    <div class="form-group">
        <label for="post_catrgory">Role</label><br>
        <select name="user_role" id="">
           
            <option value='<?php echo $user_role;?>'><?php echo $user_role;?></option>
            <?php  
            if($user_role == 'admin'){
             echo "<option value='user'>user</option>";
            }
            else {
            echo "<option value='admin'>admin</option>";
            }

            ?>

            
            
        </select>
        

    </div>


<!--

    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image" required>
    </div>
-->
       
    <div class="form-group">
        <label for="post_tags">Username</label>
        <input type="text"  value="<?php echo $username;?>" class="form-control" name="username" required>
    </div>
      
       
    <div class="form-group">
        <label for="post_tags">Email</label>
        <input type="email"  value="<?php echo $user_email;?>" class="form-control" name="user_email" required>
    </div>
       
    <div class="form-group">
        <label for="post_content">Password</label>
        <input type="text" value="<?php echo $user_password;?>" class="form-control" name="user_password" required>
    </div>
    
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="edit_user" value="Update User">
    </div>
        
</form>