<?php

class Accion
{
	private $id;
	private $nombre;
	private $activo;
	private $db;

	public function __construct()
	{
		$this->db = Database::connect();
	}

	function getId()
	{
		return $this->id;
	}

	function getNombre()
	{
		return $this->nombre;
	}

	function getActivo()
	{
		return $this->activo;
	}

	function setId($id)
	{
		$this->id = $id;
	}

	function setNombre($nombre)
	{
		$this->nombre = $this->db->real_escape_string($nombre);
	}

	function setActivo($activo)
	{
		$this->activo = $activo;
	}

	public function save()
	{
        Utils::isAdmin();
		$sql = "INSERT INTO acciones VALUES(NULL, '{$this->getNombre()}', 1);";
		$save = $this->db->query($sql);

		$result = false;
		if ($save) {
			$result = true;
		}
		return $result;
	}

	public function edit(){
        Utils::isAdmin();
		$sql = "UPDATE acciones SET nombre='{$this->getNombre()}' ";
		
		$sql .= " WHERE id={$this->id};";
		$save = $this->db->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
    }
    
    public function delete(){
		$sql = "UPDATE acciones SET activo = 0 ";
		
		$sql .= " WHERE id={$this->id};";
		$save = $this->db->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}

	public function getAll(){
		$usuarios = $this->db->query("SELECT id, nombre FROM acciones where activo = 1;");
		return $usuarios;
	}

	public function getOne(){
		$usuario = $this->db->query("SELECT id, nombre FROM acciones WHERE id = {$this->getId()}");
		return $usuario->fetch_object();
	}
}
?>