<?php
require_once 'models/usuario.php';

class usuarioController
{

	public function index()
	{
		echo "Controlador Usuarios, Acción index";
	}

	public function registro()
	{

		header("Location:" . base_url . 'registro');
		// require_once base_url . 'views/usuario/registro.php';
	}

	public function save()
	{
		if(session_status() !== PHP_SESSION_ACTIVE) session_start();

		if (isset($_POST)) {

			$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
			$apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
			$email = isset($_POST['email']) ? $_POST['email'] : false;
			$password = isset($_POST['password']) ? $_POST['password'] : false;
			$repeatPassword = isset($_POST['repeatPassword']) ? $_POST['repeatPassword'] : false;

			if ($password && $repeatPassword && $password != $repeatPassword) {
				$_SESSION['register'] = "el password no coincide";
			} else {

				if ($nombre && $apellidos && $email && $password) {
					$usuario = new Usuario();
					$usuario->setNombre($nombre);
					$usuario->setApellidos($apellidos);
					$usuario->setEmail($email);
					$usuario->setPassword($password);

					$save = $usuario->save();
					if ($save) {
						$_SESSION['register'] = "complete";
					} else {
						$_SESSION['register'] = "failed";
					}
				} else {
					$_SESSION['register'] = "failed";
				}
			}
		} else {
			$_SESSION['register'] = "failed";
		}
		// require_once base_url . 'views/usuario/registro.php';
		header("Location:" . base_url . 'registro');
		// header("Location:" . base_url . 'usuario/registro');
		
		// exit();
	}

	public function login()
	{
		if (isset($_POST)) {
			// Identificar al usuario
			// Consulta a la base de datos
			$usuario = new Usuario();
			$usuario->setEmail($_POST['email']);
			$usuario->setPassword($_POST['password']);

			$identity = $usuario->login();

			if ($identity && is_object($identity)) {
				$_SESSION['identity'] = $identity;

				if ($identity->rol == 'admin') {
					$_SESSION['admin'] = true;
				}
			} else {
				$_SESSION['error_login'] = 'Identificación fallida !!';
			}
		}
		header("Location:" . base_url);
	}

	public function logout()
	{
		if (isset($_SESSION['identity'])) {
			$_SESSION['identity'] = null;
		}

		if (isset($_SESSION['admin'])) {
			$_SESSION['admin'] = null;
		}
		//var_dump(base_url);
		//die();  

		header("Location:" . base_url);

		exit;
	}
} // fin clase
