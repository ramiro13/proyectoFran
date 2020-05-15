<?php
require_once 'models/usuario.php';

class usuarioController
{

	public function index()
	{
		$usuario = new Usuario();
		$usuarios = $usuario->getAll();
		require_once 'views/usuario/index.php';
	}

	public function ver()
	{
		if (isset($_GET['id'])) {
			$id = $_GET['id'];

			$usuario = new Usuario();
			$usuario->setId($id);

			$usuarios = $usuario->getOne();

			require_once 'views/usuario/ver.php';
		}
	}

	public function editar()
	{
		if (isset($_GET['id'])) {
			$id = $_GET['id'];

			$usuario = new Usuario();
			$usuario->setId($id);

			$usuarios = $usuario->getOne();
		}

		require_once 'views/usuario/crear.php';
	}

	public function registro()
	{

		header("Location:" . base_url . 'registro');
		// require_once base_url . 'views/usuario/registro.php';
	}

	public function save()
	{
		if (session_status() !== PHP_SESSION_ACTIVE) session_start();

		if (isset($_POST)) {

			$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
			$apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
			$email = isset($_POST['email']) ? $_POST['email'] : false;
			$password = isset($_POST['password']) ? $_POST['password'] : false;
			$repeatPassword = isset($_POST['repeatPassword']) ? $_POST['repeatPassword'] : false;
			$rol = isset($_POST['rol']) ? $_POST['rol'] : 'user';

			if ($password && $repeatPassword && $password != $repeatPassword) {
				$_SESSION['register'] = "el password no coincide";
			} else {

				if ($nombre && $apellidos && $email && $password) {
					$usuario = new Usuario();
					$usuario->setNombre($nombre);
					$usuario->setApellidos($apellidos);
					$usuario->setEmail($email);
					$usuario->setPassword($password);
					$usuario->setRol($rol);

					$save = $usuario->save($id);
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

		header("Location:" . base_url . 'registro');
	}

	public function saveCrud()
	{
		Utils::isAdmin();
		if (session_status() !== PHP_SESSION_ACTIVE) session_start();

		$respuesta['mensaje'] = "";
		$respuesta['esError'] = 0;

		if (isset($_POST)) {

			$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
			$apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
			$email = isset($_POST['email']) ? $_POST['email'] : false;
			$password = isset($_POST['password']) ? $_POST['password'] : false;
			$rol = isset($_POST['rol']) ? $_POST['rol'] : 'user';
			$id = isset($_POST['id']) ? $_POST['id'] : 0;


			if ($nombre && $apellidos && $email && $password) {
				$usuario = new Usuario();
				$usuario->setNombre($nombre);
				$usuario->setApellidos($apellidos);
				$usuario->setEmail($email);
				$usuario->setPassword($password);
				$usuario->setRol($rol);
				$usuario->setId($id);

				$usuarios = new stdClass();
				$usuarios->nombre = $nombre;
				$usuarios->apellidos = $apellidos;
				$usuarios->email = $email;
				$usuarios->password = $password;
				$usuarios->rol = $rol;
				$usuarios->id = $id;

				// Guardar la imagen

				if ($id === 0) {
					$save = $usuario->save($id);
					$usuario->setId($id);
				} else {
					$save = $usuario->edit();
				}
				if ($save) {
					$respuesta['mensaje'] = "complete";

					if (isset($_FILES['imagen'])) {
						$file = $_FILES['imagen'];
						$filename = $file['name'];
						$mimetype = $file['type'];

						if ($mimetype == "image/jpg" || $mimetype == 'image/jpeg' || $mimetype == 'image/png' || $mimetype == 'image/gif') {

							if (!is_dir('uploads/usuarios')) {
								mkdir('uploads/usuarios', 0777, true);
							}

							$filename = $id . "." . explode(".", $filename)[count(explode(".", $filename)) - 1];
							$usuario->setImagen($filename);
							$usuarios->imagen = $filename;

							move_uploaded_file($file['tmp_name'], 'uploads/usuarios/' . $filename);

							$usuario->edit();
						}
					}
				} else {
					$respuesta['mensaje'] = "failed";
					$respuesta['esError'] = 1;
				}
			} else {
				$respuesta['mensaje'] = "failed";
				$respuesta['esError'] = 1;
			}
		} else {
			$respuesta['mensaje'] = "failed";
			$respuesta['esError'] = 1;
		}

		require_once 'views/usuario/crear.php';
		// $this->editar();
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
