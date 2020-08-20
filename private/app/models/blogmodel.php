<?php

class BlogModel extends Model {

    function __construct() {
        parent::__construct();
    }

    // function DbVersion() {
    //     $sql = 'SELECT VERSION()';
    //     $stmt = $this->db->query($sql);
    //     $res = $stmt->fetch();
    //     return $res[0];
    // }

    function blogList() {
        $sql = 'SELECT * from blog_post ORDER BY publication_date';
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchAll();

        return $res;
    }

    function blogPost($slug) {
        $sql = 'SELECT * FROM blog_post
        JOIN author
        ON author.email = blog_post.author_email
        WHERE Slug = :slug';
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array("slug" => $slug));
        $res = $stmt->fetch();

        return $res;
    }

    function createBlog($slug, $post_name, $post_context, $author_email) {
        $sql = "INSERT INTO blog_post(slug, post_name, post_context, author_email) VALUES (:slug, :post_name, :post_context, :author_email)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array("slug" => $slug, "post_name" => $post_name, "post_context" => $post_context, "author_email" => $author_email));
    }

    // function latestBlog() {
    //     $sql = "SELECT * FROM blog_post ORDER BY publication_date DESC LIMIT 1";
    //      $stmt = $this->db->prepare($sql);
    //      $stmt->execute();
    //      $res = $stmt->fetch();

    //      return $res;
    // }

    function updateBlog($slug, $post_name, $post_context, $pk) {
        $sql = "UPDATE blog_post SET slug = :slug, post_name = :post_name, post_context = :post_context WHERE slug = :pk";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute(array("slug" => $slug, "post_name" => $post_name, "post_context" => $post_context, "pk" => $pk));
    }
}

?>