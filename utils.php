<?php

session_start();
if (isset($_SESSION["user"])) {
  $user = $_SESSION["user"];
} else {        
  $user =null;
}

function my_msg($msg,$redirect){ 
    echo "<script language=javascript>"; 
    echo "window.alert('".$msg."')"; 
    echo "</script>"; 
    echo "<script language=\"javascript\">"; 
    echo "location.href='".$redirect."'"; 
    echo "</script>"; 
    return; 
}



?>