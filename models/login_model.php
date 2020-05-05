<?php

class login_model{

    private $db;

    function __construct() {
        $this->db=Database::connect();
    }
    
    function userIsAuth()
    {
        // // Si no hay una sesi�n iniciada, iniciar sesion
        // if (!isset($_SESSION)) {
        //     session_start();
        // }
        // If existe la variable de sesi�n "user" entonces es que un usuario ha iniciado sesi�n
        if (isset($_SESSION['user'])) {
            return true;
        } else {
            return false;
        }
    }

    function login($Correo, $Clave)
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        $stmt = $this->db->prepare("SELECT idUsuario,Correo,idPerfil FROM usuarios where correo = :correo and clave = :clave");
        $stmt->bindParam(':correo', $Correo);
        $stmt->bindParam(':clave', $Clave);
        $stmt->setFetchMode(PDO::FETCH_OBJ);
        $stmt->Execute();
        if ($stmt->rowcount() != 1) {
            Database::disconnect();       
            return false;
        } else {
            // Si hemos autenticado al usuario entonces lo registramos en la sesi�n
            while ($row = $stmt->fetch()) {
                $_SESSION['user'] = $row->Correo;
                $_SESSION['idUsuario'] = $row->idUsuario; //$row->idUsuario;
                $_SESSION['idPerfil'] = $row->idPerfil; //$row->idUsuario;
            }
            Database::disconnect();       
            return true;
        }
    }

    function logout()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
        unset($_SESSION['user']);
        session_destroy();
    }
}
