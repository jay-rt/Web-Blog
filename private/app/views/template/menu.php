<!-- Menu -->
<nav id="menu">
    <div class="inner">
        <h2>Menu</h2>
        <ul class="links">
            <li><a href="/">Home</a></li>
            <li><a href="/blog/listofblogs">Blog Lists</a></li>
            <li><a href="/blog/readblog">Individual Posts</a></li>
            <?php 
                if($_SESSION["isLoggedIn"]) {
                    echo('<li><a href="/blog/createblog">Create New Post</a></li>');
                    echo('<li><a href="/user/signout">Sign Out</a></li>');
                } else {
                    echo('<li><a href="/user/signin">Sign In</a></li>');
                }
            ?>
        </ul>
        <a href="#" class="close">Close</a>
    </div>
</nav>