<?php
session_start();
unset($_SESSION['login_user']);
session_destroy();
session_write_close();
header("location:login.php");
?>
