<?php ob_start(); ?>
<?php session_start(); ?>
<?php include "../includes/db.php"?>
<?php include "functions.php"?>
<?php 
 
     if(!(isset($_COOKIE['user_role']) && isset($_COOKIE['username']))){
         header('Location:../index.php');
     }

 ?>
 <script>

   if(screen.width <= 800){
      window.location ='../mobile_device/index.html';
      }

</script>
<a href="../mobile_device/index.html"></a>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Control</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    

    
    
    <link rel="stylesheet" href="css/style.css">
<!--    <script src="js/script.js"></script>-->
<!--    <script src="js/script.js"></script>-->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <link href="../editor/dist/summernote.css" rel="stylesheet">
    <script src="../editor/dist/summernote.js"></script>
        <style>
    .btn-bs-file{
    position:relative;
}
.btn-bs-file input[type="file"]{
    position: absolute;
    top: -9999999;
    filter: alpha(opacity=0);
    opacity: 0;
    width:0;
    height:0;
    outline: none;
    cursor: inherit;
}
    
    
    
    </style>
    
  
</head>

<body>
                <script>
                
                    document.getElementsByTagName('body')[0].style.display="none"
                              
                </script> 