<!-- Author: Mattania Mckoy 1704278 -------------->


<!-- ---------------ADMIN LOGIN ------------------->
<?php
require("database/dbconfig.php");
session_start();

//check if button click
if(isset($_POST['adminLogin_btn']) && $_SERVER['REQUEST_METHOD'] == "POST"){

    //function to clean data before assigment
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

        if(!empty($_POST['email'])){
            $email_login = test_input($_POST['email']);
        }

        if(!empty($_POST['password'])){
            $password_login = test_input($_POST['password']);
        }


     if($email_login == 'Admin@gmail.com' && $password_login == "123"){
        $_SESSION['username'] = $email_login;
        header('Location: index.php');

    }else{
        $_SESSION['status'] = 'Email or Password is invalid';
        header('Location: admin-login.php');
        exit();
     
    }
    //  $query = "SELECT * FROM AdminTable WHERE username='$getEmail' AND password = '$getPassword'";
    //  $query_run = mysqli_query($connection, $query);

    //  if(mysqli_fetch_array($query_run))
    //  {
    //      $_SESSION['username'] = $getEmail;
    //      header('Location: index.php');
    //
    //  }else{
    //      $_SESSION['status'] = 'Email or Password is invalid';
    //      header('Location: admin-login.php');
    //  }
 
    }

?>