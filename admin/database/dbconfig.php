<!-- Author: Mattania Mckoy 1704278   -->


<!------------ DB CONNECTION -------------------->
<?php 
//define variables
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "HighSchoolBooks_DB";

// Create connection
$connection = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    header("Location: ../500.html");
}
?>

