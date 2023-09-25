<?php
session_start();
if (!isset($_SESSION["loggedadminemail"]) or !isset($_SESSION['loggedadminname'] ) or !isset($_SESSION['loggedadminid'] )) {
  ?>
<script type="text/javascript">
window.location.href="login.php"; 
</script>
  <?php
}else{
  $loggedname=$_SESSION['loggedadminname'];
  $loggedemail=$_SESSION['loggedadminemail'];
  $loggedid=$_SESSION['loggedadminid'] ;
}
?>