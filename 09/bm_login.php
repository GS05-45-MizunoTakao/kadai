<?php include("bm_head.html"); ?>
<?php include("bm_header.html"); ?>

<main class="main">
<form method="post" action="bm_login_act.php">
    <fieldset class="content field">
        <label for="lid">Email</label>
        <input type="email" name="lid">
        <label for="lpw">Password</label>
        <input type="password" name="lpw">
        <input type="submit" value="Login" class="submit-btn">
        
        <p>アカウントをお持ちでないですか？ <a href="bm_signup.php">登録する</a></p>
    </fieldset>
</form>
</main>

<?php include("bm_footer.html"); ?>