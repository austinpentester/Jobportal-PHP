<?php

session_start();
session_destroy();
setcookie('email', $email, time() - (86400 * 15), "/");
setcookie('exmne_id', $exmne_id, time() - (86400 * 15), "/");
header("Location:index.php");