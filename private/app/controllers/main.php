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
        $articles = $this->blogmodel->latestBlog();
        
        // $version = $this->blogmodel->DbVersion();

        // $data = Array("title" => "Home", "version" => $version);

        $data = Array("title" => "Home");

        $this->view("template/header", $data);
        $this->view("template/menu");
        $this->view("main/index01");

        foreach ($articles as $key=>$article) {
            $article["key"] = $key;
            $this->view("template/article", $article);

        }
        $this->view("main/index02");
        $this->view("template/footer");
        
    }

}

?>