<?php 
include('security.php');

if(isset($_POST['admin-logout-btn'])){
    session_destroy();
    unset($_SESSION['username']);
    header('Location: admin-login.php');

}

?>