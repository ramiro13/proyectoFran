<?php
require_once 'models/servicio.php';

class servicioController
{

	public function index()
	{
		$servicio = new Servicio();
		$servicios = $servicio->getAll();
		require_once 'views/servicio/index.php';
	}

	public function indexUsuario()
	{
		if (!isset($_SESSION['admin']) || (isset($_SESSION['admin']) && $_SESSION['admin'] === false)) {

			$servicio = new Servicio();
			
			$idCategoria = 0;
			$categoriaModal = "";

			$tz_object = new DateTimeZone(DateTimeZone_default);
			$horaInicio = new DateTime();

			$horaInicio->setTimezone($tz_object);

			if(isset($_POST['categoriaModal']) && !empty($_POST['categoriaModal'])){
				$idCategoria = $_POST['id'];
				$categoriaModal = $_POST['categoriaModal'];
			}

			$servicios = $servicio->getByCategoria($idCategoria);

			require_once 'views/servicio/indexUser.php';
		} else {
			$this->index();
		}
	}

	public function ver()
	{
		if (isset($_GET['id'])) {
			$id = $_GET['id'];

			$servicio = new servicio();
			$servicio->setId($id);

			$servicios = $servicio->getOne();

			require_once 'views/servicio/ver.php';
		}
	}

	public function editar()
	{
		if (isset($_GET['id'])) {
			$id = $_GET['id'];

			$servicio = new servicio();
			$servicio->setId($id);

			$servicios = $servicio->getOne();
		}

		require_once 'views/servicio/crear.php';
	}

	public function eliminar()
	{
		if (isset($_GET['id'])) {
			$id = $_GET['id'];

			$servicio = new servicio();
			$servicio->setId($id);

			$servicio->delete();

			$this->index();
		} else {
			$this->index();
		}
	}

	public function save()
	{
		if (session_status() !== PHP_SESSION_ACTIVE) session_start();

		$respuesta['mensaje'] = "";
		$respuesta['esError'] = 0;

		if (isset($_POST)) {

			$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : "";
			$id = isset($_POST['id']) && !empty($_POST['id']) ? $_POST['id'] : 0;


			if ($nombre) {
				$servicio = new servicio();
				$servicio->setNombre($nombre);
				$servicio->setId($id);

				$servicios = new stdClass();
				$servicios->nombre = $nombre;
				$servicios->id = $id;

				if ($id === 0) {
					$save = $servicio->save($id);
				} else {
					$save = $servicio->edit();
				}
				if ($save) {
					$respuesta['mensaje'] = "complete";
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

		require_once 'views/servicio/crear.php';
	}
} // fin clase
