<?php
require_once 'models/accion.php';

class accionController
{

	public function index()
	{
		$accion = new Accion();
		$acciones = $accion->getAll();
		require_once 'views/accion/index.php';
	}

	public function ver()
	{
		if (isset($_GET['id'])) {
			$id = $_GET['id'];

			$accion = new accion();
			$accion->setId($id);

			$acciones = $accion->getOne();

			require_once 'views/accion/ver.php';
		}
	}

	public function editar()
	{
		if (isset($_GET['id'])) {
			$id = $_GET['id'];

			$accion = new accion();
			$accion->setId($id);

			$acciones = $accion->getOne();
		}

		require_once 'views/accion/crear.php';
	}

	public function eliminar()
	{
		if (isset($_GET['id'])) {
			$id = $_GET['id'];

			$accion = new accion();
			$accion->setId($id);

			$accion->delete();

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
			$id = isset($_POST['id']) && !empty($_POST['id'])? $_POST['id'] : 0;


			if ($nombre) {
				$accion = new accion();
				$accion->setNombre($nombre);
				$accion->setId($id);

				$acciones = new stdClass();
				$acciones->nombre = $nombre;
				$acciones->id = $id;

				if ($id === 0) {
					$save = $accion->save();
				} else {
					$save = $accion->edit();
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

		require_once 'views/accion/crear.php';
	}
} // fin clase
