<?php

session_start();

$_SESSION = array();
setcookie(session_name(), FALSE);
session_destroy();

header('Location: index.php');
exit();