<?php

class Main extends Controller {

    function __construct() {
        parent::__construct();
    }
    /*
     * http://localhost/
     */
    function Index () {
        $data = Array("title" => "Home");

        // $this->model('blogmodel');
        
        // $version = $this->blogmodel->DbVersion();

        $this->view("template/header", $data);
        $this->view("template/menu");
        $this->view("main/index");
        $this->view("template/footer");
        
    }

    function listOfBlogs() {
        $data = Array("title" => "Blog Lists");
        $this->view("template/header", $data);
        $this->view("template/menu");
        $this->view("blog/list/index");
        $this->view("template/footer");
    }

    function readBlog() {
        $data = Array("title" => "Blog Entry");
        $this->view("template/header", $data);
        $this->view("template/menu");
        $this->view("blog/post/index");
        $this->view("template/footer");
    }

}

?>