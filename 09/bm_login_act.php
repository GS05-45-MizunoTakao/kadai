<?php
session_start();
include("func.php");

if(
  !isset($_POST["lid"]) || $_POST["lid"]=="" ||
  !isset($_POST["lpw"]) || $_POST["lpw"]=="" 
){
//  exit('ParamError');
  header("Location: bm_login.php");
  exit();
}

$lid = $_POST["lid"];
$lpw = $_POST["lpw"];

$pdo = db_con();

$sql = "SELECT * FROM gs_user_table 
        WHERE lid = :lid
        AND   lpw = :lpw
        AND   life_flg = 0";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$stmt->bindValue(':lpw', $lpw, PDO::PARAM_STR);
$res = $stmt->execute();
//SQL実行時にエラーがある場合
if($res==false){
  queryError($stmt);
}

$val = $stmt->fetch();

if( $val["id"] != "" ){
  $_SESSION["schk"] = session_id();
  $_SESSION["name"] = $val["name"];
  $_SESSION["kanri_flg"] = $val["kanri_flg"];
  header("Location: bm_list_view.php");
}else{
  //logout処理を経由して全画面へ
  header("Location: bm_login.php");
}

exit();

?>