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
        $this->checkNull();
        
        $isTrusted = $this->checkCSRF();

        if ($isTrusted && $_SERVER["REQUEST_METHOD"] == "POST" && (empty($_SESSION["isLoggedIn"]) || !$_SESSION["isLoggedIn"])) {
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
            $_SESSION["CSRFS"] = null;

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
                $this->checkNull();
                header("Location: /user/signin");
            }
            

        } else {
            if(empty($_SESSION["isLoggedIn"]) || !$_SESSION["isLoggedIn"]) {

                setcookie("CSRFS", $_SESSION["CSRFS"]);

                $data = Array("title" => "Sign In", "CSRFS" => $_SESSION["CSRFS"]);
            
                $this->view("template/header", $data);
                $this->view("template/menu");
                $this->view("user/signin", $data);
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

    function checkCSRF() {
        $csrf = $_SESSION["CSRFS"];
        $trusted = false;

        if((strcmp($_COOKIE["CSRFS"],$csrf) == 0) && (strcmp($_POST["CSRFS"],$csrf) == 0)) {
            $trusted = true;
        }

        return $trusted;
    }

    function checkNull() {
        if(empty($_SESSION["CSRFS"])) {
            $bytes = random_bytes(20);
            $_SESSION["CSRFS"] = bin2hex($bytes);
        }
    }
}

?>