<?php
require_once(dirname(dirname(__FILE__)) . '/models/login_model.php');

class login_controller
{

    private $login_model;

    function __construct()
    {
        $this->login_model = new login_model();
    }

    function login()
    {

        if ($this->login_model->userIsAuth()) {
            include_once(dirname(dirname(__FILE__)) .'/views/ejemplo.php');
        } else {

            if (isset($_POST['username'])) {
                $txtCorreo = $_POST['username'];
                $txtClave = $_POST['password'];
                if ($this->login_model->login($txtCorreo, $txtClave)) {
                    include_once(dirname(dirname(__FILE__)) .'/views/ejemplo.php');
                } else {
                    include_once(dirname(dirname(__FILE__)) .'/views/login.php');
                }
            } else {
                include_once(dirname(dirname(__FILE__)) .'/views/login.php');
            }
        }
    }

    function userIsAuth()
    {
        return $this->login_model->userIsAuth();
    }

    function logout()
    {
        $this->login_model->logout();

        echo dirname(dirname(__FILE__));

        header("location:login"); 
    }
}
