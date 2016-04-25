<?php

session_start();

unset($_SESSION['username']);
unset($_SESSION['admin_status']);

header('Location: index.php');
exit();