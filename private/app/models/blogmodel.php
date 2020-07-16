<?php

class BlogModel extends Model {

    function __construct() {
        parent::__construct();
    }

    function DbVersion() {
        $sql = 'SELECT VERSION()';
        $stmt = $this->db->query($sql);
        $res = $stmt->fetch();
        return $res[0];
    }

    function listBlogArticles() {

    }

    function readArticle($slug) {
        $sql = 'SELECT * FROM blogPost WHERE Slug = ?';
        $stmt = $this->db->prepapre($sql);
        $stmt->execute(array($slug));
        $res = $stmt->fetch();

        return $res;
    }
}

?>