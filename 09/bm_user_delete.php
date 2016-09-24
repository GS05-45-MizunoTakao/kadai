<?php
include("func.php");

$id = $_GET["id"];

$pdo = db_con();
$sql  = "UPDATE gs_bm_table 
         SET life_flg=:life_flg WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':life_flg', 1, PDO::PARAM_INT);
$status = $stmt->execute();

if($status == false) {
  queryError($stmt);
} else {
  header("Location: bm_signup.php");
  exit;
}

?>