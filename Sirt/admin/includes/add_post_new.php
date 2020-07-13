
   <?php 
           $post_title = "";
           $post_author = "";
    if(isset($_POST['add_post'])){
         
         $post_title = mysqli_real_escape_string($con,$_POST['title']);
         $post_author =  mysqli_real_escape_string($con,$_POST['author']);
         $post_category_id = $_POST['post_category'];
         $post_status =  mysqli_real_escape_string($con,$_POST['post_status']);
        
         $post_image = $_FILES['image']['name'];
         $post_image_temp = $_FILES['image']['tmp_name'];
         
         $post_tags =  mysqli_real_escape_string($con,$_POST['post_tags']);
        
         
        $post_content = mysqli_real_escape_string($con,$_POST['post_content']);
        
        
         $post_date = date('d-m-y');
  
        
   
         move_uploaded_file($post_image_temp ,"../images/$post_image");
        
 $create_post_query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status) ";
 
 $create_post_query .=" VALUES({$post_category_id}, '{$post_title}','{$post_author}',now(),'{$post_image}', '{$post_content}', '{$post_tags}', '{$post_status}')";
 
 $create_post_query_result = mysqli_query($con ,$create_post_query);
        
        if(!$create_post_query_result){
            die("Error" . mysqli_error($con));
        } 
        
        
                echo "<h2 style='color:green'>Post Created</h2>";
    }
   ?>
   <form action="" method="post" enctype="multipart/form-data" autocomplete="on">
    <div class="form-group">
        <label for="title">Post Title</label>
        <input type="text" class="form-control" name="title" required>
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
        <label for="title">Post Author</label><br>
        
<!--          <h3><?php echo $_SESSION['username']?></h3>-->
        
        <input type="text" class="form-control" value="<?php echo $_SESSION['username']?>" name="author" readonly="true">
    </div>
    
    <div class="form-group">
        <label for="post_status">Post Status</label><br>
            <select name="post_status" id="" required>
            <option value='published'>Select Category</option>
            <option value='draft'>Draft</option>
            <option value='published'>Publish</option>

            </select>
       
           </div>

    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image" accept="image/x-png,image/gif,image/jpeg" required>
    </div>
       
    <div class="form-group">
        <label for="post_tags">Post Tags : (It will be Use for Searching your post )</label><br>
        <label for="post_tags">Use : Seperate every keyword by couma(,)</label><br>
        <input type="text" class="form-control"  name="post_tags" placeholder="post title , author name, etc" required>
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
<textarea id="mceEditor" class="form-control" name="post_content" id="" cols="30" rows="10" ></textarea>
    </div>
    
    <div class="form-group">
<input type="submit" class="btn btn-primary" name="add_post" value="Add Post">

    </div>
        
</form>