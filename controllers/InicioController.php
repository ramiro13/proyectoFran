<?php
class inicioController
{
	public function login()
	{
		require_once 'views/usuario/login.php';
	}

	public function index()
	{
		if (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
			require_once 'views/inicio/indexAdmin.php';
		} else {
			require_once 'models/categoria.php';
			$categoria = new Categoria();
			$categorias = $categoria->getAll();

			require_once 'views/inicio/index.php';
		}
	}
}
