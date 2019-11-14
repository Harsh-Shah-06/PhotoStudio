<?php
session_start();

if($_SESSION['user'])
{
    $email=$_SESSION['user'];
}
elseif ($_SESSION['photographer'])
{
    $email=$_SESSION['photographer'];
}
else
{
    header("location:login.php");
}
?>