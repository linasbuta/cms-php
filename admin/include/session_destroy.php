<?php
session_start();

$_SESSION['username'] = null;
$_SESSION['first_name'] = null;
$_SESSION['lastname'] = null;
$_SESSION['user_role'] = null;
header("Location: ../../index.php");