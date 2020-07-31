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
        $sql = 'SELECT * from blog_post';
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchAll();

        return $res;
    }

    function blogPost($slug) {
        $sql = 'SELECT * FROM blog_post WHERE Slug = :slug';
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array("slug" => $slug));
        $res = $stmt->fetch();

        return $res;
    }
}

?>