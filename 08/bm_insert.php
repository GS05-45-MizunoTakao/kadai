<?php
include("func.php");

//0.入力チェック(受信確認処理追加)
if(
  !isset($_POST["title"])    || $_POST["title"]=="" ||
  !isset($_POST["subtitle"]) || $_POST["subtitle"]=="" ||
  !isset($_POST["url"])      || $_POST["url"]=="" ||
  !isset($_POST["comment"])  || $_POST["comment"]==""
){
  exit('ParamError');
}

//1.POSTデータ取得
$title    = $_POST["title"];
$subtitle = $_POST["subtitle"];
$tag      = $_POST["tag"];
$status    = $_POST["status"];
$url      = $_POST["url"];
$comment  = $_POST["comment"];

//2. DB接続します
$pdo = db_con();

//３．データ登録SQL作成
$sql  = "INSERT INTO gs_bm_table(id, title, subtitle, tag, status, url, comment, indate)
         VALUES(NULL, :title, :subtitle, :tag, :status, :url, :comment, sysdate())";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':subtitle', $subtitle, PDO::PARAM_STR);
$stmt->bindValue(':tag', $tag, PDO::PARAM_STR);
$stmt->bindValue(':status', $status, PDO::PARAM_STR);
$stmt->bindValue(':url', $url, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  queryError($stmt);
}else{
  //５．index.phpへリダイレクト
  //　Location: の後は半角スペース必須
  header("Location: bm_list_view.php");
  exit;
}
?>