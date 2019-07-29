<?php
require_once("./conn.php");
require_once('./utils.php');

session_destroy();
my_msg('登出成功','./index.php');


?>