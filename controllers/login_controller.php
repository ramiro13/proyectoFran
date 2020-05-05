<?php
require_once('models/login_model.php');

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
            include_once('views/ejemplo.php');
        } else {

            if (isset($_POST['username'])) {
                $txtCorreo = $_POST['username'];
                $txtClave = $_POST['password'];
                if ($this->login_model->login($txtCorreo, $txtClave)) {
                    include_once('views/ejemplo.php');
                } else {
                    include_once('views/login.php');
                }
            } else {
                include_once('views/login.php');
            }
        }
    }

    function userIsAuth()
    {
        if (!$this->login_model->userIsAuth()) {
            include_once('views/login.php');
        }
    }
}
