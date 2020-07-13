
                          
  <?php 
    
            $session_name = $_COOKIE['username'];


            $post_query = "SELECT * FROM post where post_author ='{$session_name}' ORDER BY post_id ASC";
            $post_query_result  =mysqli_query($con,$post_query);

            $count = mysqli_num_rows($post_query_result);


             if($count != 0){
                 
                 ?>
                              
                 <table class="table table-bordered table-hover">
                           <thead>
                               <tr>
                                   
                                   <th>Author</th>
                                   <th>Title</th>
                                   <th>Category</th>
                                   <th>Status</th>
                                   <th>Image</th>
                                   <th>Tags</th>
                                   <th>Comments</th>
                                   <th>Post Viwes</th>
                                   <th>Date</th>
                                   <th>Edit</th>
                                   <th>Delete</th>
                               </tr>
                           </thead>
                           
                           <tbody>
                              
                              
                              
            <?php


                 while($row = mysqli_fetch_assoc($post_query_result)){
                     $post_id = $row['post_id'];
                     $post_author = $row['post_author'];
                     $post_title = $row['post_title'];
                     $post_category_id = $row['post_category_id'];
                     $post_status = $row['post_status'];
                     $post_image = $row['post_image'];
                     $post_tags = $row['post_tags'];
                     $post_comment_count = $row['post_comment_count'];
                     $post_views_count = $row['post_views'];
                     $post_date = $row['post_date'];
                     
                     echo "<tr>";
                     
                     echo "<td>$post_author</td>";
                     
                     
            $query = "SELECT * FROM post WHERE post_id =$post_id";
            $query_result = mysqli_query($con, $query);

            if(!$query_result){
            echo mysqli_error();
            }

            while($row = mysqli_fetch_assoc($query_result)){

            $post_id = $row['post_id'];
            $post_title = $row['post_title'];
            echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";    
            }

             
        $category_edit_query = "SELECT * FROM categories where cat_id = $post_category_id";

                    $category_edit_query_result  =mysqli_query($con,$category_edit_query);

                    while($row = mysqli_fetch_assoc($category_edit_query_result)){

                    $cat_id = $row['cat_id'];

                    $cat_title = $row['cat_title']; }
   
                     echo "<td>$cat_title</td>";
            
            
            
                     echo "<td>$post_status</td>";
                     echo "<td><img src='../images/$post_image' width='100'></td>";
                     echo "<td>$post_tags</td>";
                     echo "<td>$post_comment_count</td>";
                     echo "<td>$post_views_count</td>";
                     echo "<td>$post_date</td>";
                     echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
                     
                     echo "<td><a rel='{$post_id}' href='javascript:void(0)' class='delete_link'>Delete</a></td>";
                     
                     //echo "<td><a onclick=\" javascript : return confirm('Are you sure want to delete this Post?')\" href='posts.php?source=&delete={$post_id}'>Delete</a></td>";
                     echo "</tr>";
                     
                     
                     
                 }

            ?> 
                           </tbody>
                           
                       </table>
                       
       <?php 

              if(isset($_GET['delete'])){                  
                  $the_post_id = $_GET['delete']; 
                  $delete_query = "DELETE FROM post where post_id = '{$the_post_id}'";
                  $delete_query_result = mysqli_query($con,$delete_query);
                   ?>
                   
                   <script>
                 window.location= 'posts.php?source=';
                  </script>
              <?php
            

              }
           ?> 
              
             
       <script>
            $(document).ready(function(){
               
                $(".delete_link").on('click', function(){
                    
                    var id = $(this).attr("rel");
                    
                    var delete_url = "posts.php?source=view_all_post_user&delete="+ id +"";
                    
                    $(".modal_delete_link").attr("href", delete_url);
                    
                    $("#myModal").modal('show');
   
                });

            });
       </script>  
 
                 
                 <?php
             }
   
 else {
     
echo "<h1 class='text-center' style='color:blue'>Sorry You have not created any post Yet.</h1>";
echo "<h1 class='text-center' style='color:blue'>Please Create Post.</h1>";
 }
     
            
                            
                

?>
