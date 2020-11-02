<?php
session_start();
include '../app/call.php';
session_destroy();
redirection ('../frontend/frontend.php');
?>