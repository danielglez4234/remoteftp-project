<?php
session_start() ; 
session_destroy();
sleep(0.7);
header("location: ../index.php");
?>
