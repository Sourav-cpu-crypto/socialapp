<?php
session_start();
if(isset($_GET['u_to']))
{
   $sql= "delete * from friends  where user_to='".$_GET['u_to']."' and user_from='".$_SESSION['id']."'";
}
if(isset($_GET['u_from']))
{
   $sql= "delete * from friends  where user_from='".$_GET['u_from']."' and user_to='".$_SESSION['id']."'";
}


?>