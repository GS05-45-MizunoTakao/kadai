<?php
session_start();
include("func.php");
adminCheck();

$pdo = db_con();
$sql  = "SELECT * FROM gs_user_table ORDER BY id DESC";
$stmt = $pdo->prepare($sql);
$res = $stmt -> execute();

$view="";
if ($res == false) {
  queryError($stmt);
} else {
  while ($result = $stmt -> fetch(PDO::FETCH_ASSOC)) {   
    if ($result["kanri_flg"] == 1) {
        $status = "fa-check";
    } else {
        $status = "";
    }
    $view .= usersMake($result, $status);
  }
}
?>


<?php include("bm_head.html"); ?>
<?php include("bm_header.php"); ?>

<main class="main">
    <?= $view ?>    
</main>

<?php include("bm_footer.html"); ?>
