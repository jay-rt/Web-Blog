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
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $slug = htmlentities($_POST["slug"]);
            $author_email = htmlentities($_POST["author_email"]);
            $post_name = htmlentities($_POST["post_name"]);
            $post_context = htmlentities($_POST["post_context"]);

            $this->model("blogmodel");
            $this->blogmodel->createBlog($slug, $post_name, $post_context, $author_email);
            header("Location: /blog/listofblogs");
        }else{
            $data = Array("title" => "Create New Blog");
            $this->view("template/header", $data);
            $this->view("template/menu");
            $this->view("blog/create/index");
            $this->view("template/footer");
        }
    }

    function updateBlog($slug = "uHadItComing") {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            
            $slug = htmlentities($_POST["slug"]);
            $post_name = htmlentities($_POST["post_name"]);
            $post_context = htmlentities($_POST["post_context"]);
            $pk = htmlentities($_POST["pk"]);

            $this->model("blogmodel");
            $wasUpdated = $this->blogmodel->updateBlog($slug, $post_name, $post_context, $pk);
            if($wasUpdated) {
                echo("Success");
            }else{
                echo("Failed");
            }
        }else{
            $this->model("blogmodel");
            $blog = $this->blogmodel->blogPost($slug);

            $data = Array("title" => "Update Blog");
            $this->view("template/header", $data);
            $this->view("template/menu");
            $this->view("blog/update/index", $blog);
            $this->view("template/footer");
        }
    }
}


?>