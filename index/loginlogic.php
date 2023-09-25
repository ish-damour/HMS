  
<?php
session_start();

?>
<!doctype html>
<html lang="en" data-bs-theme="auto">
<?php include('../includes/connection.php') ?>
  <?php
if(isset($_POST['signin'])){
  $user=$_POST['email'];
  $pass=$_POST["password"];
 //$rem=$_POST["rememberme"];
  if(!empty($user&&$pass)){
  $que=mysqli_query($con,"SELECT * FROM doctors,admin where docemail='$user' OR docemail='$user' OR ");
  if(mysqli_num_rows($que)>0){
    while ($fec=mysqli_fetch_array($que)) {
    $a=$fec["docname"];
    $b=$fec["docemail"];
    $c=$fec["password"];
    $rty=$fec[""];
    if((($a==$user OR $b==$user) AND $pass==$c)){
      session_start();
      if ($rty=="Admin") {
      $_SESSION['there']=$fec["username"];
      $_SESSION["here"]=$fec["email"];
       $_SESSION['ad']=$rty; 
      }else{
      $_SESSION['there']=$fec["username"];
      $_SESSION["here"]=$fec["email"];
      }
      
      header("location:../../pages/books/books.php");
    }else if((($a==$user OR $b==$user) AND $pass!=$c) ){
      $message="<div class='alert text-center alert-warning mt-2 font-weight-bold'>!Invalid password </div>";
            $_SESSION['message']=$message;

      ?>
<script type="text/javascript">
window.location.href="index.php"; 
</script>
      <?php
    }
    }
  }else{
  $message="<div class='alert text-center alert-warning mt-2 font-weight-bold'>! Unknown User </div>";   

        $_SESSION['message']=$message;

      ?>
<script type="text/javascript">
window.location.href="index.php"; 
</script>
      <?php  
    }
}else{
 $message="<div class='alert text-center alert-warning mt-2 font-weight-bold'><strong><i class='fa fas fa-exclamation-triangle'></i>  Fill All Fields Are Required </strong></div>"; 
      // Start the session

      
      $_SESSION['message']=$message;

      ?>
<script type="text/javascript">
window.location.href="index.php"; 
</script>
      <?php
}}

?>