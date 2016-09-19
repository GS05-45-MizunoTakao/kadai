<?php
include("func.php");

$id = $_GET["id"];

$pdo  = db_con();
$sql  = "SELECT * FROM gs_bm_table WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt -> bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

if($status == false) {
  quwryError($stmt);
} else {
  $row = $stmt -> fetch();    
}

?>


<?php include("bm_head.html"); ?>
<?php include("bm_header.html"); ?>

<!-- jsでオプションタグの値を変更 -->
<script id="script" src="js/bm_tag.js" tag = '<?php echo json_safe_encode($row["tag"]); ?>' status = '<?php echo json_safe_encode($row["status"]); ?>'></script>

<main class="main">
<form method="post" action="bm_update.php">
    <fieldset class="content field">
        <label for="title">Title</label>
        <input type="text" name="title" value="<?= $row["title"] ?>">
        <label for="subtitle">Author</label>
        <input type="text" name="subtitle" value="<?= $row["subtitle"] ?>">
        <label for="tag">Tag</label>
        <select name="tag" id="tag-update">
            <!-- jsでオプションの設定を変更 -->
            <option value="文学">文学</option>
            <option value="思想">思想</option>
            <option value="ビジネス">ビジネス</option>
            <option value="テクノロジー">テクノロジー</option>
            <option value="アート">アート</option>
            <option value="旅行">旅行</option>
            <option value="コミック">コミック</option>
            <option value="雑誌">雑誌</option>
            <option value="その他">その他</option>
        </select>
        <label for="status">Done/Want</label>
        <select name="status" id="status-update">
            <!-- jsでオプションの設定を変更 -->
            <option value="読んだ">読んだ</option>
            <option value="読みたい">読みたい</option>
        </select>
        <label for="url">URL</label>
        <input type="text" name="url" value="<?= $row["url"] ?>">
        <label for="comment">Comment</label>
        <textArea name="comment" rows="4" cols="40" placeholder=""><?= $row["comment"] ?></textArea>
        <input type="hidden" name="id" value="<?= $id ?>">
        <input type="submit" value="更新" class="submit-btn">
    </fieldset>
</form>  
</main>

<?php include("bm_footer.html"); ?>