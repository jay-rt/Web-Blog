<!-- Wrapper -->
    <section id="wrapper">
        <header>
            <div class="inner">
                <h2>Blog Post</h2>
                <p>Hehe! How did you like my little tactics. Got you to click right! Now that you are here, why not read it anyway.</p>
            </div>
        </header>

        <!-- Content -->
            <div class="wrapper">
                <div class="inner">

                    <h3 class="major"><?php echo($post_name)?></h3>
                    <p><?php echo($post_context)?></p>
                    
                    <p> <?php echo($first_name . " " . $last_name)?><br>
                        <?php echo($email)?><br>
                        <?php echo($publication_date)?></p>

                    <?php if(strcmp($email,$_SESSION["email"]) == 0) : ?>
                    <ul class="actions">
                        <li><a href="/blog/updateblog/<?php echo($slug)?>" class="button">Update</a></li>
                    </ul>
                    <?php endif ?>

                </div>
            </div>

    </section>