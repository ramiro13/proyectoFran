<?php
require_once 'models/categoria.php';

class categoriaController
{

	public function index()
	{
		$categoria = new Categoria();
		$categorias = $categoria->getAll();
		require_once 'views/categoria/index.php';
	}

	public function ver()
	{
		if (isset($_GET['id'])) {
			$id = $_GET['id'];

			$categoria = new categoria();
			$categoria->setId($id);

			$categorias = $categoria->getOne();

			require_once 'views/categoria/ver.php';
		}
	}

	public function editar()
	{
		if (isset($_GET['id'])) {
			$id = $_GET['id'];

			$categoria = new categoria();
			$categoria->setId($id);

			$categorias = $categoria->getOne();
		}

		require_once 'views/categoria/crear.php';
	}

	public function eliminar()
	{
		if (isset($_GET['id'])) {
			$id = $_GET['id'];

			$categoria = new categoria();
			$categoria->setId($id);

			$categoria->delete();

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
				$categoria = new categoria();
				$categoria->setNombre($nombre);
				$categoria->setId($id);

				$categorias = new stdClass();
				$categorias->nombre = $nombre;
				$categorias->id = $id;

				if ($id === 0) {
					$save = $categoria->save();
				} else {
					$save = $categoria->edit();
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

		require_once 'views/categoria/crear.php';
	}
} // fin clase
