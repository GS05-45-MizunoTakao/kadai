<?php
session_start();
include("func.php");
ssidCheck();

$pdo = db_con();
$sql  = "SELECT * FROM gs_bm_table ORDER BY id DESC";
$stmt = $pdo->prepare($sql);
$status = $stmt -> execute();

$view="";
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
  }
}
?>


<?php include("bm_head.html"); ?>
<?php include("bm_header.php"); ?>

<main class="main">
    <?= $view ?>
</main>

<?php include("bm_footer.html"); ?>
