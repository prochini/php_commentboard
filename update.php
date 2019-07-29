<?php require_once('./conn.php'); 
$id = $_POST['id'];
$content = htmlspecialchars($_POST['updateContent'],ENT_QUOTES);
if(empty($content)){
    echo"empty data";
}
$sql = "UPDATE prochini_comment SET content = ? WHERE id = ?";
$stmt = $conn ->stmt_init();
if (!$stmt->prepare($sql)){
    echo"SQL statement failed";
}else{
    $stmt->bind_param("si", $content, $id);
    $stmt->execute();
}
?>