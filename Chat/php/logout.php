<?php
    session_start();
    if(isset($_SESSION['id'])){
        include_once "config.php";
        $logout_id = mysqli_real_escape_string($conn, $_GET['logout_id']);
        if(isset($logout_id)){
            $status = "Offline now";
            $sql = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE id='".$_GET['logout_id']."' and status!=deactive");
            if($sql){
                session_unset();
                session_destroy();
                header("location: ../../signlog.php");
            }
        }else{
            header("location: ../../index.php");
        }
    }else{  
        header("location: ../../signlog.php");
    }
?>