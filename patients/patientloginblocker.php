<?php
session_start();
if (!isset($_SESSION["loggeduseremail"]) or !isset($_SESSION['loggedusername'] ) or !isset($_SESSION['loggeduserid'] )) {
  ?>
<script type="text/javascript">
window.location.href="login.php"; 
</script>
  <?php
}else{
  $loggedname=$_SESSION['loggedusername'];
  $loggedemail=$_SESSION['loggeduseremail'];
  $loggedid=$_SESSION['loggeduserid'] ;
}
?>