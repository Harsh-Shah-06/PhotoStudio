<?php

session_start();
session_destroy();
header('Location:../../Moment/login.php');
?>