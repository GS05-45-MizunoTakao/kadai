<?php
include("func.php");

$id = $_GET["id"];

$pdo = db_con();
$sql  = "DELETE FROM gs_bm_table WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

if($status == false) {
  queryError($stmt);
} else {
  header("Location: bm_list_view.php");
  exit;
}

?>
