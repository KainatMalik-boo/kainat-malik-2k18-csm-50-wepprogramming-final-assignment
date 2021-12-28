<?php 
session_start();

if(!isset($_SESSION["users"])){
    $_SESSION["users"] = array();
    $total_users = 0;
}
else{
    $users = $_SESSION["users"];
    $total_users = sizeof($users);
}

$user_exists = false;

$new_user = array("f_name" => "" , "l_name" => "" , "age" => "" , "email" => "" , "password" => "" ,"address" => "" );

?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>REGISTERATION FORM</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="margin: 0px;
background-color: lightsalmon;">

    <div class="regis">
        <div class="navbar">
            <div>
                <h1>WEB PROGRAMMING</h1>
        
            </div>
        
            <div>
                <ul class="select">
                    <li><a href="index.php">HOME</a></li>
                    <li><a href="index.php">LOGIN</a></li>
                </ul>
            </div>
        <div class="register">
            <form method="post">
                <h1 class="R_heading">REGISTER HERE</h1>
                <label>First Name</label>
                <br>
                <input type="text" name="First_Name" placeholder="Enter Your First Name">
                <br><br>
                <label>Last Name</label>
                <br>
                <input type="text" name="Last_Name" placeholder="Enter Your Last Name">
                <br><br>
                <label>Age</label>
                <br>
                <input type="number" name="Age" placeholder="How Old Are You">
                <br><br>
                <label>Email</label>
                <br>
                <input type="email" name="Email" placeholder="Enter Your Email ">
                <br><br>
                <label>password</label>
                <br>
                <input type="password" name="Password" placeholder="Enter Your Password">
                <br><br>
                <label>Address</label>
                <br>
                <input type="text" name="Address" placeholder="Enter Your Address">
                <br><br>
                <input type="submit" value="Submit" name="submit">

            <?php 
            if(isset($_POST["submit"]))
            {
                echo "<p>submitted</p>";
                $new_user["f_name"] = $_POST["First_Name"];
                $new_user["l_name"] = $_POST["Last_Name"];
                $new_user["age"] = $_POST["Age"];
                $new_user["email"] = $_POST["Email"];
                $new_user["password"] = $_POST["Password"];
                $new_user["address"] = $_POST["Address"];                

                if($new_user["f_name"] != "" && $new_user["l_name"] != "" && $new_user["age"] != "" && 
                $new_user["email"] != "" && $new_user["password"] != "" && $new_user["address"] != "" ){
                        
                        if($total_users!=0){
                            foreach($users as $user){
                                if($user["email"] != $new_user["email"]){
                                    $user_exists = false;
                                }
                                else{
                                    echo "<p style='color: red;text-align: center;'>User Already Exists</p>";
                                    $user_exists = true;
                                    break;
                                }
                            }
                            if(!$user_exists){
                                $users["user".$total_users] = $new_user;
                                // print_r($users);
                                $_SESSION["users"] = $users;
                                
                                header('location: index.php');
                            }
                        }
                        else{
                            $users["user".$total_users] = $new_user;
                            // print_r($users);
                            $_SESSION["users"] = $users;
                            header('location: index.php');
                        }
                    }
                    
            }
        ?>
            </form>
        
        </div>
    </div>
</body>
</html>