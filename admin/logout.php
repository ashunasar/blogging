<?php 

      setcookie("username","",time() - 3600,"/");
      setcookie("name","",time() - 3600,"/");
      setcookie("user_role","",time() - 3600,"/");
      setcookie("img_path","",time()- 3600,"/");

?>
<script>
window.location = '../index.php';
</script>