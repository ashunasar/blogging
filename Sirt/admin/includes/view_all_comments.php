 <table class="table table-bordered table-hover">
                           <thead>
                               <tr>
                                   <th>ID</th>
                                   <th>Author</th>
                                   <th>Comment</th>
                                   
                                   <th>Status</th>
                                   <th>Post Title</th>
                                   <th>Date</th>
                                   <th>Approve</th>
                                   <th>Unapprove</th>
                                   <th>Delete</th>
                               </tr>
                           </thead>
                           
                           <tbody>
                              
                              
                              
            <?php
    
                $comments_query = "SELECT * FROM comments ORDER BY comment_id ASC";
                $comments_query_result  =mysqli_query($con,$comments_query);
                 while($row = mysqli_fetch_assoc($comments_query_result)){
                     $comment_id = $row['comment_id'];
                     $comment_post_id = $row['comment_post_id'];
                     $comment_author = $row['comment_author'];
                     $comment_content = $row['comment_content'];
                     $comment_status = $row['comment_status'];
                     $comment_date = $row['comment_date'];

                     
                     echo "<tr>";
                     echo "<td>$comment_id</td>";
                     echo "<td>$comment_author</td>";
                     echo "<td>$comment_content</td>";
             
//        $category_edit_query = "SELECT * FROM categories where cat_id = $post_category_id";
//
//                    $category_edit_query_result  =mysqli_query($con,$category_edit_query);
//
//                    while($row = mysqli_fetch_assoc($category_edit_query_result)){
//
//                    $cat_id = $row['cat_id'];
//
//                    $cat_title = $row['cat_title']; 
                     
                    
                     echo "<td>$comment_status</td>";
                     
                     $query = "SELECT * FROM post WHERE post_id =$comment_post_id";
                     $query_result = mysqli_query($con, $query);
                     
                      if(!$query_result){
                          echo mysqli_error();
                      }
                      
                     while($row = mysqli_fetch_assoc($query_result)){
                         
                         $post_id = $row['post_id'];
                         $post_title = $row['post_title'];
                     echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";    
                     }
                     
                     echo "<td>$comment_date</td>";
                     echo "<td><a href='comments.php?source=view_all_comments&approve={$comment_id}'>Approve</a></td>";
                     echo "<td><a href='comments.php?source=view_all_comments&unapprove={$comment_id}'>Unapprove</a></td>";
                
                     echo "<td><a rel='{$comment_id}' href='javascript:void(0)' class='delete_link'>Delete</a></td>";
                     
                     //     echo "<td><a onclick=\" javascript : return confirm('Are you sure want to delete this Comment?')\" href='comments.php?source=view_all_comments&delete=$comment_id'>Delete</a></td>";
                     echo "</tr>";
                     
                     
                     
                 }

            ?> 
                           </tbody>
                                
                       </table>
                       
       <?php 


                if(isset($_GET['unapprove'])){
                $the_comment_id = $_GET['unapprove'] ; 
                $unapprove_query = "UPDATE comments SET comment_status='unapproved' where comment_id = {$the_comment_id} ";
                $unapprove_query_result = mysqli_query($con,$unapprove_query);
                ?>
                <script>
                window.location= 'comments.php?source=view_all_comments';
                </script>
                <?php
                }


                if(isset($_GET['approve'])){
                $the_comment_id = $_GET['approve'] ; 
                $approve_query = "UPDATE comments SET comment_status='approved' where comment_id ={$the_comment_id}";
                $approve_query_result = mysqli_query($con,$approve_query);
                ?>
                <script>
                window.location= 'comments.php?source=view_all_comments';
                </script>
                <?php
                }

                if(isset($_GET['delete'])){

                if(isset($_COOKIE['user_role'])){
                if($_COOKIE['user_role'] == 'admin'){
                
    

                $the_comment_id = $_GET['delete'] ; 
                $delete_query = "DELETE FROM comments where comment_id ={$the_comment_id}";
                $delete_query_result = mysqli_query($con,$delete_query);
                 $comments_count ="UPDATE post SET post_comment_count = post_comment_count - 1 where post_id = $comment_post_id";
                    mysqli_query($con,$comments_count);
                ?>

                <script>
                window.location= 'comments.php?source=view_all_comments';
                </script>
                <?php
                }
                }
                }
           ?> 
                     <script>
            $(document).ready(function(){
               
                $(".delete_link").on('click', function(){
                    
                    var id = $(this).attr("rel");
                    
                    var delete_url = "comments.php?source=view_all_comments&delete="+ id +"";
                    
                    $(".modal_delete_link").attr("href", delete_url);
                    
                    $("#myModal").modal('show');
   
                });

            });
       </script>  
             
  