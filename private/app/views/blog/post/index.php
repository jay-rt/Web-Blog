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

                    <!-- <h3 class="major">The Golden Touch</h3>

                    <p>A Tale from Ancient Greece</p>
                    
                    <p>There was once a king named Midas who did a good deed for a Satyr and was granted a wish by the God of wine, Dionysus. For his wish, Midas asked that whatever he touched would turn to gold. Although Dionysus tried to dissuade him, Midas insisted that the wish was an excellent one, and it was granted!</p>

                    <p>Excitedly, Midas went about touching all sorts of things, turning them into gold</p>

                    <p>Soon Midas became hungry. He picked up a piece of food, but he couldn't eat it, for it had turned to gold in his hand! "I'll starve," moaned Midas, "Perhaps this was not such a good wish after all!"</p>

                    <p>Midas' beloved daughter, seeing his dismay, threw her arms about him to comfort him, and, she too turned to gold! "The golden touch is no blessing," cried Midas. He went to the river and wept. The sand of that river turned as yellow as "fool's gold" for it is there, they say, that King Midas washed away the curse of the golden touch with his own tears.</p> -->

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