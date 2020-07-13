
   <form action="" method="post" enctype="multipart/form-data" autocomplete="on">
    <h2 id="sucsess" style="color:green;display:none;"> Post Created</h2>
       
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title" required>
    </div>
    
    <div class="form-group">
        <label for="post_catrgory">Post Category</label><br>
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
        <label for="title">Post Author</label><br>    
        <input type="text" class="form-control" value="<?php echo $_COOKIE['username']?>" name="author" readonly="true">
    </div>
    
    <div class="form-group">
        <label for="post_status">Select Post Status</label><br>
            <select name="post_status" id="" required>
            <option value='published'>Publish</option>
            <option value='draft'>Draft</option>
            </select>
       
           </div>

    <div class="form-group">
<label class="btn-bs-file btn btn-lg btn-success" style="background-color: #2196F3;border-radius: 3px;padding: 10px;">
Upload Post Image
<input type="file" name='image_file' accept="image/*" />
</label>
    </div>
      <div class="form-group" id="img_error" style="display:none;">
          <h2 style="color:red;">Please select Post Image</h2>
      </div>
       
    <div class="form-group">
        <label for="post_tags">Post Tags : (Words related To Your Post)</label><br>
        <input type="text" class="form-control" name="post_tags" placeholder="post title , author name, etc" required>
    </div>
       
    <div class="form-group">
        <label for="post_content">Post Content</label>
<textarea id="summernote" class="form-control" name="post_content" id="" cols="30" rows="10" ></textarea>
    </div>
    
    <div class="form-group">
<input type="submit" class="btn btn-primary" name="add_post" value="Add Post">

    </div>
        
</form>





   <?php 

    if(isset($_POST['add_post'])){
          
         $post_title = mysqli_real_escape_string($con,$_POST['title']);
         $post_author =  mysqli_real_escape_string($con,$_POST['author']);
         $post_category_id = $_POST['post_category'];
         $post_status =  mysqli_real_escape_string($con,$_POST['post_status']);

        $user_image = $_FILES['image_file']['name'];
        
         
         $post_tags =  mysqli_real_escape_string($con,$_POST['post_tags']);
        
         
        $post_content = mysqli_real_escape_string($con,$_POST['post_content']);
    
        
         $post_date = date('d-m-y');
        
        if(!empty($user_image)){
            $user_image_temp = $_FILES['image_file']['tmp_name'];   
        $ext = explode('.',$user_image);
        $image_name = $post_author.'post'.rand(1,100000).rand(1,100000).rand(1,100000).rand(1,100000).rand(1,100000). $ext[0] .'.'. $ext[1];
        $path = "../images/" . $image_name ;
        move_uploaded_file($user_image_temp ,$path);
        $create_post_query = "INSERT INTO post(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status) ";

        $create_post_query .=" VALUES({$post_category_id}, '{$post_title}','{$post_author}',now(),'{$image_name}', '{$post_content}', '{$post_tags}', '{$post_status}')";

        $create_post_query_result = mysqli_query($con ,$create_post_query);

        if(!$create_post_query_result){
        die("Error" . mysqli_error($con));
        } ?>

                  <script>
         document.getElementById('sucsess').style.display='block';
 
       </script>
       <?php
        //echo "<h2 style='color:green'>Post Created</h2>";
        }
        if(empty($user_image)){
            ?>
        <script>
         document.getElementById('img_error').style.display='block';
 
       </script>
            <?php
        }

        

    }
   ?>