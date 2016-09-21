<?php
include("func.php");

if(
  !isset($_POST["title"]) || !isset($_POST["subtitle"])
){
  exit('ParamError');
}

$title    = $_POST['title'];
$subtitle = $_POST['subtitle'];
$tag      = $_POST['tag'];
$status   = $_POST['status']; 
//$status修正予定

$pdo = db_con();

if ($tag == "") {
    $sql_tag = " ";
    $tag_hash = "";
} else {
    $sql_tag = " AND tag = '".$tag."'";
    $tag_hash = "#".$tag;
}
if ($status == "") {
    $sql_status = " ";
    $status_hash = "";
} else {
    $sql_status = " AND status = '".$status."'";
    $status_hash = "#".$status;
}

$sql = "SELECT * FROM gs_bm_table 
        WHERE title LIKE '%".$title."%' 
        AND subtitle LIKE '%".$subtitle."%'
        ".$sql_tag.$sql_status." 
        ORDER BY id DESC";

$stmt = $pdo->prepare($sql);
$b_status = $stmt->execute();
//$status修正予定

$view  = "";
$count = 0;
if ($b_status == false) {
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
    <div class="search-wrapper">
    <ul class="search-info">
        <li><i class='fa fa-fw fa-search' aria-hidden='true'></i></li>
        <li><?= $title ?></li>
        <li><?= $subtitle ?></li>
        <li><?= $tag_hash ?></li>
        <li><?= $status_hash ?></li>        
        <li><?= $count ?>件</li>
    </ul>
    </div>
    <?= $view ?>
</main>

<?php include("bm_footer.html"); ?>