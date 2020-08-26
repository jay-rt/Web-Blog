<?php

class Blog extends Controller {
    function Index () {

        $data = Array("title" => "Home");

        $this->view("template/header", $data);
        $this->view("template/menu");
        $this->view("main/index", $data);
        $this->view("template/footer");
        
    }

    function listOfBlogs() {

        $this->model("blogmodel");
        $articles = $this->blogmodel->blogList();

        $data = Array("title" => "Blog Lists");
        $this->view("template/header", $data);
        $this->view("template/menu");
        $this->view("blog/list/index01");

        foreach ($articles as $key=>$article) {
            $article["key"] = $key;
            $this->view("template/article", $article);

        }
        $this->view("blog/list/index02");
        $this->view("template/footer");
    }

    function readBlog($slug = "uHadItComing") {

        $this->model("blogmodel");
        $article = $this->blogmodel->blogPost($slug);

        $data = Array("title" => "Blog Entry");
        $this->view("template/header", $data);
        $this->view("template/menu");
        $this->view("blog/post/index", $article);
        $this->view("template/footer");
    }

    function createBlog() {
        $this->checkNull("CSRFC");
        
        $isTrusted = $this->checkCSRF("CSRFC");

        if ($isTrusted && $_SERVER["REQUEST_METHOD"] == "POST" && $_SESSION["isLoggedIn"]) {

            $slug = htmlentities($_POST["slug"]);
            $post_name = htmlentities($_POST["post_name"]);
            $post_context = htmlentities($_POST["post_context"]);
            $author_email = $_SESSION["email"];
            $_SESSION["CSRFC"] = null;

            $this->model("blogmodel");
            $this->blogmodel->createBlog($slug, $post_name, $post_context, $author_email);
            header("Location: /");
        }else if ($_SERVER["REQUEST_METHOD"] != "POST" && $_SESSION["isLoggedIn"]){

            setcookie("CSRFC", $_SESSION["CSRFC"]);

            $data = Array("title" => "Create New Blog", "CSRFC" => $_SESSION["CSRFC"]);
            $this->view("template/header", $data);
            $this->view("template/menu");
            $this->view("blog/create/index",$data);
            $this->view("template/footer");
        }else {
            header("Location: /");
        }
    }

    function updateBlog($slug) {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && $_SESSION["isLoggedIn"]) {

            
            $slug = htmlentities($_POST["slug"]);
            $post_name = htmlentities($_POST["post_name"]);
            $post_context = htmlentities($_POST["post_context"]);
            $pk = htmlentities($_POST["pk"]);

            $this->model("blogmodel");
            // $wasUpdated = $this->blogmodel->updateBlog($slug, $post_name, $post_context, $pk);
            $this->blogmodel->updateBlog($slug, $post_name, $post_context, $pk);
            // if($wasUpdated) {
            //     echo("Success");
            // }else{
            //     echo("Failed");
            // }
            header("Location: /blog/readblog/$slug");
        }else if($_SERVER["REQUEST_METHOD"] != "POST" && $_SESSION["isLoggedIn"]){
            $this->model("blogmodel");
            $blog = $this->blogmodel->blogPost($slug);

            $email = $blog["email"];

            if(strcmp($email,$_SESSION["email"]) == 0){
                $data = Array("title" => "Update Blog");
                $this->view("template/header", $data);
                $this->view("template/menu");
                $this->view("blog/update/index", $blog);
                $this->view("template/footer");
            } else {
                header("Location: /");
            }
        } else{
            header("Location: /");
        }
    }
}


?>