<?php 

function insert_category(){
    
     global $con;
     
 if(isset($_POST['submit'])){
                                   
    $cat_title = $_POST['cat_title'];
                                 
    if($cat_title == '' || empty($cat_title)){
                                       
      echo "<h5>Plese Enter the category</h5>";

        } 
       else {
       $insert_cat_query = "INSERT INTO categories(cat_title) VALUE('$cat_title')";
       $insert_cat_query_result =mysqli_query($con,$insert_cat_query);
        if(!$insert_cat_query_result){
            echo "fail" . mysqli_error($con);
                    }
                                       
               }
                                   
               }
           }





function display_categories(){
    
     global $con;
    
    $category_query = "SELECT * FROM categories ";
    $category_query_result  =mysqli_query($con,$category_query);
     while($row = mysqli_fetch_assoc($category_query_result)){
         $cat_id = $row['cat_id'];
         $cat_title = $row['cat_title'];

         echo "<tr>";
         echo "<td>{$cat_id}</td>";
         echo "<td>{$cat_title}</td>";
         echo "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
         echo "<td><a rel='{$cat_id}' href='javascript:void(0)' class='delete_link'>Delete</a></td>";
         echo "</tr>";

     }    
    
    
}




function delete_categories(){
    
    global $con;
    if(isset($_GET['delete'])){

      $the_cat_id = $_GET['delete'];
        $delete_query ="DELETE FROM categories WHERE cat_id = {$the_cat_id}";
       $delete_query_result =mysqli_query($con,$delete_query);

        ?>

        <script>
    window.location  = 'categories.php';
    </script>

        <?php
    }

}















?>