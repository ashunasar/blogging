<?php include "includes/admin_header.php" ?>

    <div id="wrapper">

        <!-- Navigation -->
<?php include "includes/admin_navigation.php" ?>
        <script>

        document.getElementsByTagName('body')[0].style.display="block";

        </script>
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                              Welcome To Category Section 
                            <small>You can cotrol over categories</small>
                        </h1>

                        <div class="col-xs-6">
                           
                           <?php insert_category()?>

                            <form action="" method="post">
                                <div class="form-group">
                                   <label for="cat-title">Add Category</label>
                                    <input type="text" class="form-control" name="cat_title">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" name="submit" value="Add Category">
                                </div>
                                
                            </form>
                            
                                
                             
                               <?php 
                             //Update categories codes 
                             
                                 if(isset($_GET['edit'])){
                                     
                                      $cat_id = $_GET['edit'];
                                     
                                     include 'includes/update_categories.php';
                                 }
                            
                               ?>
                            
                            
                        </div>
                         <div class="col-xs-6">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th> Categories</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                               

                               <?php  display_categories();?>      
                               
                                                        
                            <?php delete_categories();?>                         
                            </tbody>
                        </table>
                        </div>
                   
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
<?php include "includes/delete.php" ?>
<?php include "includes/admin_footer.php" ?>
      
       <script>
            $(document).ready(function(){
               
                $(".delete_link").on('click', function(){
                    
                    var id = $(this).attr("rel");
                    
                    var delete_url = "categories.php?delete="+ id +"";
                    
                    $(".modal_delete_link").attr("href", delete_url);
                    
                    $("#myModal").modal('show');
   
                });

            });
       </script>  