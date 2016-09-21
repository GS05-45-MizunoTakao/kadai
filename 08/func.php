<?php

//DB接続関数（PDO）
function db_con(){
//    $dbname = 'gs_db';
//    $host   = 'localhost';
    try {
      $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
    } catch (PDOException $e) {
      exit('DbConnectError:'.$e->getMessage());
    }
    return $pdo;
}

//SQL処理エラー
function queryError($stmt){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
}

/**
* XSS
* @Param:  $str(string) 表示する文字列
* @Return: (string)     サニタイジングした文字列
*/
function h($str){
  return htmlspecialchars($str, ENT_QUOTES, "UTF-8");
}

//コンテンツ作成
function contentsMake($result, $status) {
  return   
    "<div class='content'>
        <div class='content-info'>
            <ul class='content-tag'>
                <li><a href='bm_tag_view.php?tag=".$result["tag"]."'>".$result["tag"]."</a></li>
                <li><i class='fa ".$status."' aria-hidden='true'></i></li>
            </ul>
            <ul class='content-setting'>
                <li class='time'><time datetime='2016-8-20'>".substr($result["indate"], 0, 10)."</time></li>
                <li class='setting' id='setting-".$result["id"]."'><i class='fa fa-chevron-down' aria-hidden='true'></i></li>
                <ul class='setting-child'>
                    <li><a href='bm_detail_view.php?id=".$result["id"]."'><i class='fa fa-fw fa-cog' aria-hidden='true'></i>編集</a></li>
                    <li><a href='bm_delete.php?id=".$result["id"]."'><i class='fa fa-fw fa-times' aria-hidden='true'></i>削除</a></li>
                </ul>
            </ul>
        </div>
        <p class='title'><a href='".h($result["url"])."'>".h($result["title"])."</a></p>
        <p class='author'>".h($result["subtitle"])."</p>
        <p class='comment'>".nl2br(h($result["comment"]))."</p>
    </div>";
    
}

// id='setting-".$result["id"]."'

//phpからjsへ変数を渡す際のエスケープオプションを指定
function json_safe_encode($data){
    return json_encode($data, JSON_HEX_TAG | JSON_HEX_AMP | JSON_HEX_APOS | JSON_HEX_QUOT);
}

?>