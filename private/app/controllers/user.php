<?php

class User extends Controller {

    function __construct() {
        parent::__construct();
    }
    /*
     * http://localhost/
     */
    function Index () {
        echo("This is the user controller");
    }

    function SignIn() {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
             $data = Array("title" => "PHP Blog");

            //TODO: send out signup form
            $this->view("template/header", $data);
            $this->view("user/signin");
            $this->view("template/footer");
        } else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //TODO: Authenticate the user
            // echo("You posted the form");

            $email = htmlentities($_POST["email"]);
            $password = htmlentities($_POST["password"]);
            // echo("$email -> $password <br>");
            // echo(password_hash($password, PASSWORD_DEFAULT));
            $isValidPass = password_verify($password, '$2y$10$sinpSZ9iLqLUW.eRSkEZF.fMr1jcE0FQ2fjvxu1LoT6BkBpGlEwYW');

            if($isValidPass) {
                echo("Valid");
                $_SESSION['LoggedIn'] = true;
            } else{
                echo("Not Valid");
            }

            print_r($_SESSION);
        }
    }
}

?>