<?php
    $ID = $_POST["student_id"];
    $PWD = $_POST["student_pwd"];
    session_start();
    if ($_POST['Logout'] == "true") {
        unset($_SESSION['LoginUser']);
        header("Refresh: 0; url=index.php");
        exit;
    }
    elseif($PWD == $ID)
    {
        header('Location: login_new.php');
        exit();
    }
    else
    {
        echo "<a href=index.php>ERROR PWD!! PLEASE ENTER AGAIN!!</a>";
    }
    
?>