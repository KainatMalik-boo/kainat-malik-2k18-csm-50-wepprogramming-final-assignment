<?php 
session_start();

if(isset($_SESSION["current_user"])){
    $current_user = $_SESSION["current_user"];
}
else{
    $current_user = [];
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
   
    <title>todopost</title>
    <link rel="stylesheet" href="style.css">
</head>
<body style="margin: 0px;
background-color: rgb(195, 232, 235);">
    <div class="navbar">
        <div>
            <h1>WEB PROGRAMMING</h1>

        </div>
   
        <div>
            <ul class="select">
                <li><a href="home.php">HOME</a></li>
                <li><a href="logout.php">LOGOUT</a></li>
                <?php 
                    if($current_user != []){
                        echo"<li><a style='color: white;'>".$current_user['f_name']." ".$current_user['l_name']."</a></li>";
                    }
                ?>
            </ul>
        </div>
    </div>
    <div class="options">
        <form method="post">
            <label >Todo</label>
            <br>
            <input type="Submit" value="CLICK HERE" name="submit_Todo">
            <br><br>
            <label >Blog host</label>
            <br>
            <input type="Submit" value="CLICK HERE" name="submit_Blog">

            <?php
                if(isset($_POST["submit_Todo"])){
                    header('location: todolist.php');
                }
                elseif(isset($_POST["submit_Blog"])) {
                    header('location: blog-host/index.php');
                }
            
            ?>
        </form>
    </div>
    
</body>
</html>