<?php

class Main extends Controller {

    function __construct() {
        parent::__construct();
    }
    /*
     * http://localhost/
     */
    function Index () {
        // $this->model('blogmodel');
        
        // $version = $this->blogmodel->DbVersion();

        // $data = Array("title" => "Home", "version" => $version);

        $data = Array("title" => "Home");

        $this->view("template/header", $data);
        $this->view("template/menu");
        $this->view("main/index", $data);
        $this->view("template/footer");
        
    }

}

?>