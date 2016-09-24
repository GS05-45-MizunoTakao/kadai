<?php
session_start();
include("func.php");

if(
  !isset($_POST["name"]) || $_POST["name"]=="" ||
  !isset($_POST["lid"]) || $_POST["lid"]=="" ||
  !isset($_POST["lpw"]) || $_POST["lpw"]=="" 
){
  header("Location: bm_signup.php");
  exit();
}

$name = $_POST["name"];
$lid  = $_POST["lid"];
$lpw  = $_POST["lpw"];

$pdo = db_con();

$sql  = "INSERT INTO gs_user_table(id, name, lid, lpw, kanri_flg, life_flg, indate)
         VALUES(NULL, :name, :lid, :lpw, :kanri_flg, :life_flg, sysdate())";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);
$stmt->bindValue(':kanri_flg', 0, PDO::PARAM_INT);
$stmt->bindValue(':life_flg', 0, PDO::PARAM_INT);
$res = $stmt->execute();
//SQL実行時にエラーがある場合
if($res==false){
  queryError($stmt);
  header("Location: bm_signup.php");
} else {
  $_SESSION["schk"] = session_id();
  $_SESSION["name"] = $val["name"];
  $_SESSION["kanri_flg"] = $val["kanri_flg"];
  header("Location: bm_list_view.php");
  exit();
}

?>