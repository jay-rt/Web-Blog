<?php

class Main extends Controller {

    function __construct() {
        parent::__construct();
    }
    /*
     * http://localhost/
     */
    function Index () {
        $this->model('blogmodel');
        
        $version = $this->blogmodel->DbVersion();

        $data = Array("title" => "Home", "version" => $version);

        $this->view("template/header", $data);
        $this->view("template/menu");
        $this->view("main/index", $data);
        $this->view("template/footer");
        
    }

    function listOfBlogs() {
        $data = Array("title" => "Blog Lists");
        $this->view("template/header", $data);
        $this->view("template/menu");
        $this->view("blog/list/index");
        $this->view("template/footer");
    }

    function readBlog($slug) {

        $this->model("blogmodel");
        $article = $this->blogmodel->readArticle($slug);

        $data = Array("title" => "Blog Entry");
        $this->view("template/header", $data);
        $this->view("template/menu");
        $this->view("blog/post/index", $article);
        $this->view("template/footer");
    }

}

?>