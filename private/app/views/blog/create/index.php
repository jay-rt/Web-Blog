<section id="wrapper">
    <header>
        <div class="inner">
            <h2>Create New Blog</h2>
            <form method="POST">
                <label>Slug <input type="text" name="slug" title="Enter the slug value for this post" required></label>
                <label>Title <input type="text" name="post_name" title="Enter the title of the post" required></label>
                <label>Content <textarea name="post_context" title="Enter the Content for the post" required></textarea></label>
                <button type="submit">Create</button>
            </form>
        </div>
    </header>
</section>