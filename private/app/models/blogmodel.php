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
}

?>