<?php

session_start();
include ('header.php');
include ('helper.php');


if(isset($_SESSION['userID'])){
    require ('mysqli_connect.php');
    $user = get_user_info($con, $_SESSION['userID']);
}
?>
<?php 
if(isset($_SESSION["userID"])){?>
<section id="main-site">
    <div class="container py-5 user_information">
        <div class="row">
            <div class="col-4 offset-4 shadow py-4 user-show">
                <div class="upload-profile-image d-flex justify-content-center pb-5">
                    <div class="text-center">
                        <img class="img rounded-circle" style="width: 200px; height: 200px;" src="<?php echo isset($user['profileImage']) ? $user['profileImage'] : './assets/profile/beard.png'; ?>" alt="">
                        <h4 class="py-3">
                            <?php
                            if(isset($user['firstName'])){
                                printf('%s %s', $user['firstName'], $user['lastName'] );
                            }
                            ?>
                        </h4>
                    </div>
                </div>

    
                <div class="user-info px-3">
                    <ul class="font-ubuntu navbar-nav">
                        <li class="nav-link"><b>First Name: </b><span><?php echo isset($user['firstName']) ? $user['firstName'] : ''; ?></span></li>
                        <li class="nav-link"><b>Last Name: </b><span><?php echo isset($user['lastName']) ? $user['lastName'] : ''; ?></span></li>
                        <li class="nav-link"><b>Email: </b><span><?php echo isset($user['email']) ? $user['email'] : ''; ?></span></li>
                    </ul>
                </div>
                <button class="btn btn-info shadow gap-2 justify-center">
                    <a href="logout.php" class="text-decoration-none ">Click here to logout</a>
                </button>

            </div>
        </div>
        
    </div>
</section>
<?php }else{
    header("Location: register.php");
}
?>

<?php
include "footer.php";
?>
