<?php
include("func.php");

$tag = $_GET['tag'];

$pdo = db_con();

$sql = "SELECT * FROM gs_bm_table WHERE tag = '" .$tag. "' ORDER BY id DESC";
$stmt = $pdo->prepare($sql);
$status = $stmt -> execute();

$view  = "";
$count = 0;
if ($status == false) {
  queryError($stmt);
} else {
  while ($result = $stmt -> fetch(PDO::FETCH_ASSOC)) {
    if ($result["status"] == "読んだ") {
        $status = "fa-check";
    } else {
        $status = "";
    }
    $view .= contentsMake($result, $status);
    $count++;
  } 
}

?>


<?php include("bm_head.html"); ?>
<?php include("bm_header.html"); ?>

<main class="main">
    <ul class="tag">
    <li><a href="#"><?= $tag ?></a></li>
    <li>登録<?= $count ?>件</li>
    </ul>
    <?= $view ?>
</main>

<?php include("bm_footer.html"); ?>
