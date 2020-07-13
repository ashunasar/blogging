                            <form action="" method="post">
                                <div class="form-group">
                                   <label for="cat-title">Edit Category</label>
            <?php
            if(isset($_GET['edit'])){

            $cat_id =$_GET['edit'];

            $category_edit_query = "SELECT * FROM categories where cat_id = $cat_id";
                
            $category_edit_query_result  =mysqli_query($con,$category_edit_query);
                
            while($row = mysqli_fetch_assoc($category_edit_query_result)){
                
            $cat_id = $row['cat_id'];
                
            $cat_title = $row['cat_title'];
            ?>

            <input type="text" value="<?php if(isset($cat_title)){echo $cat_title;} ?>" class="form-control" name="cat_title">        

            <?php   } } ?>
                                   
                                   
                                   
                                    
                                </div>
                                <div class="form-group">
                                   
                <?php

                if(isset($_POST['submit_edit'])){
                $update_title = $_POST['cat_title'];

                if($update_title == '' || empty($update_title)){
                echo "Please Enter The Update Catagory Name<br>";
                }
                else{
                $update_query = "update categories set cat_title = '{$update_title}' " ; 
                $update_query .= " where cat_id = '{$cat_id}'";
                $update_query_result = mysqli_query($con,$update_query);
                if(!$update_query_result){
                die("Query failed" . mysqli_error($con));  
                }
                }

                }
                ?>
                                   
                                   
                                   
                                    <input type="submit" class="btn btn-primary" name="submit_edit" value="Update Category">
                                </div>
                                
                            </form>