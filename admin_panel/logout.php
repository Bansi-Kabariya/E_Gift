<?php
session_start();
session_destroy();
header("Location: ad_login.php");
exit();
?>
