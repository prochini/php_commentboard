<?php require_once('./conn.php'); 
      require_once('./utils.php');

$id = $_POST['id'];
$username = $_POST['username'];
$sql = "DELETE FROM prochini_comment where (id = $id or parent_id = $id) AND username = '$username'";

if ($conn->query($sql)) {
    header("Location: ./index.php");
} else {
    die("failed.");
}
?>