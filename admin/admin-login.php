<?php 
session_start();
include('includes/header.php');
?>


<div class="container">
<!-- Outer Row -->
<div class="row justify-content-center">

<div class="col-xl-6 col-lg-6 col-md-6">

<div class="card o-hidden border-0 shadow-lg my-5">
<div class="card-body p-0">
<!-- Nested Row within Card Body -->
<div class="row">
    <div class="col-lg-12">
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Log In</h1>

                <!-- output error message if credentials are invalid -->
                <?php 
                    if(isset($_SESSION['status']))
                    {
                        echo "<h3 class='bg-danger text-white'>".$_SESSION['status']. "</h3>";
                        unset($_SESSION['status']);
                    }
                ?>
            </div>
            <form class="user" action="admin-login-code.php" method="POST">

                <div class="form-group">
                    <input type="email" name="email" class="form-control form-control-user"  placeholder="Enter Email Address..." required>
                </div>

                <div class="form-group">
                    <input type="password" name="password" class="form-control form-control-user" placeholder="Password" required>
                </div>

                <button type="submit" name="adminLogin_btn" class="btn btn-primary btn-user btn-block"> Login </button>
                <hr> 

            </form>
        </div>
    </div>
</div>
</div>
</div>

</div>

</div>

</div>


<?php
include('includes/scripts.php');
?>