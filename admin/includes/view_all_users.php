
               <table class="table table-bordered table-hover">
               <thead>
                   <tr>
                       <th>User ID</th>
                       <th>Username</th>
                       <th>Name</th>
                       <th>Email</th>
                       <th>Mobile No.</th>
                       <th>Role</th>
                   </tr>
               </thead>

               <tbody>
                              
                              
                              
            <?php
    
                $users_query = "SELECT * FROM user ORDER BY user_id ASC";
                $users_query_result  =mysqli_query($con,$users_query);
                 while($row = mysqli_fetch_assoc($users_query_result)){
                     $user_id = $row['user_id'];
                     $user_username = $row['user_username'];
                     $user_name = $row['user_name'];
                     $user_email = $row['user_email'];
                     $user_phone = $row['user_phone'];
                     $user_img = $row['user_img'];
                     $user_role = $row['user_role'];

                     
                     echo "<tr>";
                     echo "<td>$user_id</td>";
                     echo "<td>$user_username</td>";
                     echo "<td>$user_name</td>";                 
                     echo "<td>$user_email</td>";
                     echo "<td>$user_phone</td>";
                     echo "<td>$user_role</td>";             
                     echo "<td><a href='users.php?source=view_all_users&change_to_admin={$user_id}'>Admin</a></td>";
                     echo "<td><a href='users.php?source=view_all_users&change_to_user=
                     {$user_id}'>Student</a></td>";
                      echo "<td><a rel='{$user_id}' href='javascript:void(0)' class='delete_link'>Delete</a></td>";
                     echo "</tr>";
                     
                     
                     
                 }

            ?> 
                           </tbody>
                                
                       </table>
                       
       <?php 


                if(isset($_GET['change_to_admin'])){
                $the_user_id = $_GET['change_to_admin'] ; 
                $change_to_admin_query = "UPDATE user SET user_role='admin' where user_id = {$the_user_id} ";
                $change_to_admin_query_result = mysqli_query($con,$change_to_admin_query);
                ?>
                <script>
                window.location= 'users.php?source=view_all_users';
                </script>
                <?php
                }


                if(isset($_GET['change_to_user'])){
                $the_user_id = $_GET['change_to_user'] ; 
                $change_to_user_query = "UPDATE user SET user_role='student' where user_id = {$the_user_id} ";
                $change_to_user_query_result = mysqli_query($con,$change_to_user_query);
                ?>
                <script>
                window.location= 'users.php?source=view_all_users';
                </script>
                <?php
                }

              if(isset($_GET['delete'])){
                
                
               
                          
                  $the_user_id = $_GET['delete'] ; 
                  $delete_user_query = "DELETE FROM user where user_id ={$the_user_id}";
                  $delete_user_query_result = mysqli_query($con,$delete_user_query);
                 
                   ?>
                   
                   <script>
                  window.location= 'users.php?source=view_all_users';
                  </script>
              <?php 
                          
                    
                  

              }
           ?> 
                     <script>
            $(document).ready(function(){
               
                $(".delete_link").on('click', function(){
                    
                    var id = $(this).attr("rel");
                    
                    var delete_url = "users.php?source=view_all_users&delete="+ id +"";
                    
                    $(".modal_delete_link").attr("href", delete_url);
                    
                    $("#myModal").modal('show');
   
                });

            });
       </script>  

  