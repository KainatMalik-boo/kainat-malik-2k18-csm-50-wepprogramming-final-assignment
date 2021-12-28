<?php
    session_start();
?> 
<!DOCTYPE html>
<html>
    <head>
        <title>Todo list Assignment</title>
    </head>
    <body>
        <form method='post'>
            <h4>Task</h4>
            <input type='text', name = 'task_input' style = 'width: 60; margin:0;'>
            <input type='submit' , value= 'ADD' name= 'send'>
            <h4>Todo List :</h4>            
        </form>
        <?php
            if(!isset($_SESSION['todo_list'])){
                $_SESSION['todo_list'] = array();
            }
            else{
                $todo = $_SESSION['todo_list'];
                if(isset($_POST['send'])){
                    $task = $_POST['task_input'];
                    if($task != ""){
                        array_push($todo,$task);
                    }   
                }
                if ($todo != NULL){                
                    $task_counter = 1;
                    foreach($todo as $values){
                        if($values != ""){
                            echo "<p><strong>".strval($task_counter)."</strong> : $values</p>";
                            $task_counter++;
                        }
                    }      
                }
                $_SESSION['todo_list'] = $todo;
            }  
        ?>
    </body>
</html>
