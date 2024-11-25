<?php
session_start();
session_unset();
session_destroy();
header("location: ../../pages/auth/login.php")

?>