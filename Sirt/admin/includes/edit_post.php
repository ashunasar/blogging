<?php 

                  if(isset($_GET['p_id'])){
                      $the_post_id =  $_GET['p_id'];
                  }
                     
                
                      $post_query = "SELECT * FROM post where post_id = $the_post_id";
                $post_query_result  =mysqli_query($con,$post_query);
                 while($row = mysqli_fetch_assoc($post_query_result)){
                     $post_id = $row['post_id'];
                     $post_author = $row['post_author'];
                     $post_title = $row['post_title'];
                     $post_category_id = $row['post_category_id'];
                     $post_status = $row['post_status'];
                     $path = $row['post_image'];
                     $post_tags = $row['post_tags'];
                     $post_content = $row['post_content'];

                 }

?>   
   
   <?php 


    if(isset($_POST['update_post'])){
         $post_title = mysqli_real_escape_string($con,$_POST['title']);
         $post_author = mysqli_real_escape_string($con,$_POST['author']);
         $post_category_id = $_POST['post_category'];
         $post_status =  mysqli_real_escape_string($con,$_POST['post_status']);
        $user_image = $_FILES['image_file']['name'];

         
         $post_tags =  mysqli_real_escape_string($con,$_POST['post_tags']);
        $post_content = mysqli_real_escape_string($con,$_POST['post_content']);
          if(empty($user_image)){
              
              $img_query = " select * from post where post_id = {$the_post_id}";
              $img_query_result = mysqli_query($con, $img_query);
              
              while($row = mysqli_fetch_assoc($img_query_result)){
                  $image_name = $row['post_image'];
              }
          }
        elseif(!empty($user_image)){
        
        $user_image_temp = $_FILES['image_file']['tmp_name'];   
        $ext = explode('.',$user_image);
        $image_name = $post_author.'post'.rand(1,100000).rand(1,100000).rand(1,100000).rand(1,100000).rand(1,100000). $ext[0] .'.'. $ext[1];
        $path = "../images/" . $image_name ;
        move_uploaded_file($user_image_temp ,$path);
        }

        
        
        
$query = "UPDATE post SET ";
$query .= "post_title = '{$post_title}', ";
$query .= "post_category_id = '{$post_category_id}', ";
$query .= "post_status = '{$post_status}', ";
$query .= "post_tags = '{$post_tags}', ";
$query .= "post_content = '{$post_content}', ";
$query .= "post_image = '{$image_name}' ";
$query .= "where post_id = '{$the_post_id}' ";

    $update_post =mysqli_query($con,$query);
        
        if(!$update_post){
            die("error "  . mysqli_error($con) );
        }
        
                echo "<h2 style='color:green'>Post Succesfully Updated</h2>";
            ?>
            
            <script>
              window.location = window.location.href;
            </script>
            
            <?php
    }



  ?>
   
   
   <form action="#" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" value="<?php echo $post_title; ?>" class="form-control" name="title" required>
    </div>
    
    <div class="form-group">
        <label for="post_catrgory">Post Category Id</label><br>
        <select name="post_category" id="">
            <?php

   $category_edit_query = "SELECT * FROM categories ";

     $category_edit_query_result  =mysqli_query($con,$category_edit_query);

      while($row = mysqli_fetch_assoc($category_edit_query_result)){

     $cat_id = $row['cat_id'];
     $cat_title = $row['cat_title'];
          echo "<option value='$cat_id'>$cat_title</option>";
      }

   ?>
        </select>

    </div>

    <div class="form-group">
        <label for="title">Post Author</label>
        <input type="text" value="<?php echo $post_author;?>" class="form-control" name="author" readOnly="true">
    </div>
    
    <div class="form-group">
        <label for="post_status">Post Status</label><br>
       <select name="post_status" id="">
           <option value="<?php echo $post_status; ?>"><?php echo $post_status; ?></option>
           
            <?php 
            
           if($post_status == 'published'){
               echo "<option value='draft'>Draft</option>";
           }
           else{
                echo "<option value='published'>Publish</option>";
           }
             ?>
       </select>
           </div>
    <div class="form-group">
        <label for="post_image">Post Image</label><br>
        <img src="../images/<?php echo $path; ?>" width="100" alt=""><br><br>
        <label class="btn-bs-file btn btn-lg btn-success" style="background-color: #2196F3;border-radius: 3px;padding: 10px;">
        Update Post  Image
        <input type="file" name='image_file' accept="image/*"/>
        </label>
    </div>
       
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input type="text" value="<?php echo $post_tags; ?>" class="form-control" name="post_tags" required>
    </div>
       
    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea id="summernote" class="form-control" name="post_content"
         id="" cols="30" rows="10" ><?php echo $post_content;?>
        </textarea>
        
    </div>
    
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="update_post" value="Update Post">
    </div>
        
</form>