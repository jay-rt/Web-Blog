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

    function blogList() {
        $sql = 'SELECT 
            a.name AS Name
            ,b.post_name AS "Post Name"
            ,b.post_context AS "Post Context"
            FROM author a
            JOIN blogPost b
            ON a.email = b.author_email';
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetch();

        return $res;
    }

    function blogPost($slug) {
        $sql = 'SELECT * FROM blogPost WHERE Slug = ?';
        $stmt = $this->db->prepapre($sql);
        $stmt->execute(array($slug));
        $res = $stmt->fetch();

        return $res;
    }
}

?>