<?php
include "../app/models/User.php";

class Auth
{
    public $Objuser;

    public function __construct()
    {
        $this->Objuser = new User();
    }

    public function insign(){
        include_once "../app/views/view/signin.php";
    }
   

    public function upsign(){
        include_once "../app/views/view/signup.php";
    }
    
  


    public function signup(){
        extract($_POST);
        $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
        $setUser = $this->Objuser->setUser($firstname, $lastname, $email, $hashedpassword);
        $signUser = $this->Objuser->createUser();
        if ($signUser) {
            include_once "../app/views/view/signin.php";
        }
        else{
            echo "Not Registered";
        }
    }
    
    public function signin()
    {
        extract($_POST);
        $signUser = $this->Objuser->signUser($email, $password);
        if ($signUser) {
            $_SESSION['id'] = $signUser['id'];
            $_SESSION['role_id'] = $signUser['role_id'];
            $_SESSION['firstname'] = $signUser['firstname'];
            $this->checkUser($_SESSION['role_id']);
        } else {
            echo "Wrong Inputs!";
        }
    }


    public function checkUser($id)
    {
        if ($id == 1) {
            header("Location: /Admin/index");
        } else if ($id == 2) {
            header("Location: /");
        }
    }

    public function logout()
    {
        session_destroy();
        header("Location: /");
    }
}