<?php
//1. POSTデータ取得

$title    = $_POST["title"];
$subtitle = $_POST["subtitle"];
$tag      = $_POST["tag"];
$url      = $_POST["url"];
$comment  = $_POST["comment"];


//2. DB接続します
try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
} catch (PDOException $e) {
  exit('DbConnectError:'.$e->getMessage());
}


//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_bm_table(id, title, subtitle, tag, url, comment, indate )VALUES(NULL, :title, :subtitle, :tag, :url, :comment, sysdate())");
$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':subtitle', $subtitle, PDO::PARAM_STR);
$stmt->bindValue(':tag', $tag, PDO::PARAM_STR);
$stmt->bindValue(':url', $url, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  //５．index.phpへリダイレクト
  //　Location: の後は半角スペース必須
  header("Location: bm_list_view.php");
  exit;
}
?>