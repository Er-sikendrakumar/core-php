<?php 
session_start();
if(isset($_SESSION['useremail'])){
}else{
  header("Location: http://localhost/core-php/adminpanel/");
}
?>