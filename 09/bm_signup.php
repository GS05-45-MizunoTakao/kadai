<?php include("bm_head.html"); ?>
<?php include("bm_header.html"); ?>

<main class="main">
<form method="post" action="bm_signup_act.php">
    <fieldset class="content field">
        <label for="name">Name</label>
        <input type="text" name="name">
        <label for="lid">Email</label>
        <input type="email" name="lid">
        <label for="lpw">Password</label>
        <input type="password" name="lpw">
        <input type="submit" value="Sign Up" class="submit-btn">
        
        <p>アカウントをお持ちですか？ <a href="bm_login.php">ログインする</a></p>
    </fieldset>
</form>
</main>

<?php include("bm_footer.html"); ?>