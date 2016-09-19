<?php

try {
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost', 'root', '');
} catch (PDOException $e) {
  exit('データベースに接続できませんでした。'.$e -> getMessage());
}

$stmt = $pdo->prepare("SELECT * FROM gs_bm_table ORDER BY id DESC");
$status = $stmt -> execute();

$view="";
if ($status == false) {
  $error = $stmt -> errorInfo();
    exit("ErrorQuery:".$error[2]);
} else {
  while ($result = $stmt -> fetch(PDO::FETCH_ASSOC)) {
    $view .= "<div class='content'>
            <div class='content-info'>
            <ul>
            <li><a href='bm_tag_view.php?tag=".$result["tag"]."'>".$result["tag"]."</a></li>
            </ul>
            <p class='time'><time datetime='2016-8-20'>".substr($result["indate"], 0, 10)."</time></p>
            </div>
            <p class='title'><a href='".$result["url"]."'>".$result["title"]."</a></p>
            <p class='author'>".$result["subtitle"]."</p>
            <p class='comment'>".nl2br($result["comment"])."</p>
            </div>";
  } 
}

?>


<?php include("bm_header.html"); ?>

<main class="main">
    <?= $view ?>
</main>

<?php include("bm_footer.html"); ?>
