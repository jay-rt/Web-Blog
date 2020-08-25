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
    
    function signIn() {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && (empty($_SESSION["isLoggedIn"]) || !$_SESSION["isLoggedIn"])) {
            $email = htmlentities($_POST["email"]);
            $password = htmlentities($_POST["password"]);
            // $verify = password_hash($password,PASSWORD_DEFAULT);
            // echo($verify);
            $this->model("blogmodel");
            $hash = $this->blogmodel->getpasswordhash($email);
            // echo($hash);
            $isVerified = password_verify($password, $hash);
            $_SESSION["isLoggedIn"] = $isVerified;
            $_SESSION["email"] = $email;

            if($_SESSION["isLoggedIn"]) {
                // echo("$isVerified <br>"); 
                // echo("Hash : $hash <br>");
                // echo("Password: $password <br>");
                // echo("Logged in");
                header("Location: /");
            } else {
                // echo("$isVerified <br>");
                // echo("Hash : $hash <br>");
                // echo("Password: $password <br>");
                // echo("Invalid Credentials");
                header("Location: /user/signin");
            }
            

        } else {
            if(empty($_SESSION["isLoggedIn"]) || !$_SESSION["isLoggedIn"]) {
                $data = Array("title" => "Sign In");
            
                $this->view("template/header", $data);
                $this->view("template/menu");
                $this->view("user/signin");
                $this->view("template/footer");
            } else {
            header("Location: /");
            }
        }
    }

    function signOut() {
        // $_SESSION["isLoggedIn"] = false;
        // unset($_SESSION["isLoggedIn"]);
        $_SESSION = array();
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        session_destroy();
        header("Location: /");
    }
}

?>