<?php include("bm_head.html"); ?>
<?php include("bm_header.html"); ?>

<main class="main">
<form method="post" action="bm_insert.php">
    <fieldset class="content field">
        <label for="title">Title</label>
        <input type="text" name="title">
        <label for="subtitle">Author</label>
        <input type="text" name="subtitle">
        <label for="tag">Tag</label>
        <select name="tag">
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
        <select name="status">
            <option value="読んだ">読んだ</option>
            <option value="読みたい">読みたい</option>
        </select>
        <label for="url">URL</label>
        <input type="text" name="url">
        <label for="comment">Comment</label>
        <textArea name="comment" rows="4" cols="40" placeholder=""></textArea>
        <input type="submit" value="登録" class="submit-btn">
    </fieldset>
</form>  
</main>

<?php include("bm_footer.html"); ?>