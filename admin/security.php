<!-- Checks if user is logged in
Restrict user from manual redirection
-->
<?php

session_start();
// include('database/dbconfig.php');

// if($dbconfig){
//     //echo "Database Connected";
// }else{
//     header("Location: database/dbconfig.php");
// }


if(!$_SESSION['username']){
    header('Location: admin-login.php');
}


?>