<?php
include("func.php");

if(
  !isset($_POST["title"])    || $_POST["title"]=="" ||
  !isset($_POST["subtitle"]) || $_POST["subtitle"]=="" ||
  !isset($_POST["url"])      || $_POST["url"]=="" ||
  !isset($_POST["comment"])  || $_POST["comment"]==""
){
  exit('ParamError');
}

$id       = $_POST["id"];
$title    = $_POST["title"];
$subtitle = $_POST["subtitle"];
$tag      = $_POST["tag"];
$status    = $_POST["status"];
$url      = $_POST["url"];
$comment  = $_POST["comment"];

$pdo = db_con();
$sql  = "UPDATE gs_bm_table 
         SET title=:title, subtitle=:subtitle, tag=:tag, status=:status,  url=:url, comment=:comment WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id,   PDO::PARAM_INT);
$stmt->bindValue(':title', $title,   PDO::PARAM_STR);
$stmt->bindValue(':subtitle', $subtitle,  PDO::PARAM_STR);
$stmt->bindValue(':tag', $tag,  PDO::PARAM_STR);
$stmt->bindValue(':status', $status,  PDO::PARAM_STR);
$stmt->bindValue(':url', $url,   PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment,   PDO::PARAM_STR);
$status = $stmt->execute();

if($status == false) {
  queryError($stmt);
} else {
  header("Location: bm_list_view.php");
  exit;
}

?>