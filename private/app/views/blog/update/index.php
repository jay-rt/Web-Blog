<section id="wrapper">
    <header>
        <div class="inner">
            <h2>Update Blog</h2>
            <form method="POST">
                <input type="hidden" name="pk" value="<?php echo($slug); ?>" >
                <label>Slug <input type="text" name="slug" title="Enter the slug value for this post" <?php if ($slug != "") {echo("value =\"$slug\"");} ?> required></label>
                <label>Title <input type="text" name="post_name" title="Enter the title of the post" <?php if ($post_name != "") {echo("value =\"$post_name\"");} ?>required></label>
                <label>Content <textarea name="post_context" title="Enter the Content for the post" required><?php {echo($post_context);}?></textarea></label>
                <button type="submit">Update</button>
            </form>
        </div>
    </header>
</section>