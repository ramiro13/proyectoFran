<?php

class ServicioCliente
{
	private $id;
	private $idCategoria;
	private $categoria;
	private $cliente;
	private $inicio;
	private $fin;
	private $tiempo;
	private $usuario;

	private $db;

	public function __construct()
	{
		$this->db = Database::connect();
	}

	function getId()
	{
		return $this->id;
	}

	function getIdCategoria()
	{
		return $this->idCategoria;
	}

	function getCategoria()
	{
		return $this->categoria;
	}

	function getCliente()
	{
		return $this->cliente;
	}

	function getInicio()
	{
		return $this->inicio;
	}

	function getFin()
	{
		return $this->fin;
	}

	function getTiempo()
	{
		return $this->tiempo;
	}

	function getUsuario()
	{
		return $this->usuario;
	}

	function setId($id)
	{
		$this->id = $id;
	}

	function setIdCategoria($idCategoria)
	{
		$this->idCategoria = $idCategoria;
	}

	function setCategoria($categoria)
	{
		$this->categoria = $this->db->real_escape_string($categoria);
	}


	function setCliente($cliente)
	{
		$this->cliente = $this->db->real_escape_string($cliente);
	}

	function setInicio($inicio)
	{
		$this->inicio = $inicio;
	}

	function setFin($fin)
	{
		$this->fin = $fin;
	}

	function setTiempo($tiempo)
	{
		$this->tiempo = $tiempo;
	}

	function setUsuario($usuario)
	{
		$this->usuario = $this->db->real_escape_string($usuario);
	}

	public function save(&$id)
	{
		$sql = "INSERT INTO servicios_cliente (id, idCategoria, categoria, cliente, inicio, fin, tiempo, usuario) 
			VALUES(
				null,
				{$this->getIdCategoria()}, 
				'{$this->getCategoria()}', 
				'{$this->getCliente()}', 
				'{$this->getInicio()}', 
				'{$this->getFin()}', 
				{$this->getTiempo()}, 
				'{$this->getUsuario()}');";
		$save = $this->db->query($sql);

		$result = false;
		if ($save) {
			$result = true;
			$id = $this->db->insert_id;
		}
		return $result;
	}

	public function saveAccion($idAccion)
	{
		$sql = "INSERT INTO servicios_cliente_accion (id, idServicioCliente, idAccion) 
			VALUES(
				null,
				{$this->getId()}, 
				{$idAccion});";
		$save = $this->db->query($sql);

		$result = false;
		if ($save) {
			$result = true;
		}
		return $result;
	}
}
