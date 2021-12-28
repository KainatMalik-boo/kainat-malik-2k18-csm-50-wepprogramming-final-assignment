<?php 
session_start();
if(isset($_SESSION["users"])){
    $users = $_SESSION["users"];
    $_SESSION["current_user"] = array();
    $current_user = array();
    $login = false;
    // print_r($users);
}
else{
    $users = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>LOGIN PAGE</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="margin: 0px;background-color: rgb(19, 194, 150);">
    <div>
        <div class="navbar">
            <div>
                <h1>WEB PROGRAMMING</h1>

            </div>
    
            <div>
                <ul class="select">
                    <li><a href="#">HOME</a></li>
                    <li><a href="register.php">REGISTER</a></li>
                </ul>
            </div>
        </div>
        <div>
            <form method="POST">
                <div class="user">
                    <h1 class="heading">LOGIN FORM</h1>
                    <label>User Name</label>
                    <br>
                    <input type="email" name="username" placeholder="User Name / Email">
                </div>
                <br>
                <div class="pass">
                    <label>Password</label>
                        <br>
                        <input type="password" name="password" placeholder="Password">
                </div>
                <div class="submit">
                    <input type="Submit" value="LOGIN" name="submit">
                </div>

                <?php
                    if(isset($_POST["submit"])){
                        $username = $_POST["username"];
                        $password = $_POST["password"];
                        if($users != []){
                            foreach($users as $user){
                                if($user["email"] == $username && $user["password"] == $password){
                                    $current_user["f_name"] = $user["f_name"];
                                    $current_user["l_name"] = $user["l_name"];
                                    $current_user["email"] = $user["email"];
                                    $current_user["address"] = $user["address"];
                                    $current_user["age"] = $user["age"];
                                    
                                    $_SESSION["current_user"] = $current_user;
                                    $login = true;
                                    header('location: home.php');
                                    break;

                                }
                            }
                            if(!$login){
                                echo "<p style='color: red;text-align: center;'> Wrong email/password</p>";
                            }
                        }
                    }
                ?>
            </form>
        </div>
    </div>
    
</body>
</html>