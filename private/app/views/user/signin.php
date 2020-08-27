<section id="wrapper">
    <header>
        <div class="inner">
            <h2>Sign In</h2>
            <form method="POST">
                <input type="hidden" name="CSRFS" value="<?php echo($CSRFS)?>">
                <label>Email: <input type="email" name="email" autocomplete="email" required></label>
                <label>Password: <input type="password" name="password" autocomplete="current-password" required></label>
                <input type="submit" name="submit" value="Sign In">
            </form>   
        </div>
    </header>
</section>