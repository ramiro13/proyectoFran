<?php

class Servicio
{
	private $id;
	private $nombre;
	private $descripcion;
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

	function getDescripcion()
	{
		return $this->descripcion;
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

	function setDescripcion($descripcion)
	{
		$this->descripcion = $this->db->real_escape_string($descripcion);
	}

	function setActivo($activo)
	{
		$this->activo = $activo;
	}

	public function save(&$id)
	{
        Utils::isAdmin();
		$sql = "INSERT INTO servicios VALUES(NULL, '{$this->getNombre()}', '{$this->getDescripcion()}', 1);";
		$save = $this->db->query($sql);

		$result = false;
		if ($save) {
			$result = true;
			$id = $this->db->insert_id;
		}
		return $result;
	}

	public function edit(){
        Utils::isAdmin();
		$sql = "UPDATE servicios SET 
			nombre='{$this->getNombre()}'
			,nombre='{$this->getDescripcion()}' ";
		
		$sql .= " WHERE id={$this->id};";
		$save = $this->db->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
    }
    
    public function delete(){
		$sql = "UPDATE servicios SET activo = 0 ";
		
		$sql .= " WHERE id={$this->id};";
		$save = $this->db->query($sql);
		
		$result = false;
		if($save){
			$result = true;
		}
		return $result;
	}

	public function getAll(){
		$usuarios = $this->db->query("SELECT id, nombre, descripcion FROM servicios where activo = 1;");
		return $usuarios;
	}

	public function getByCategoria($idCategoria){
		$usuarios = $this->db->query("SELECT 
			s.id
			,s.nombre
			,s.descripcion 
			,IFNULL( (SELECT si.imagen FROM servicios_imagen si WHERE si.idservicio = s.id LIMIT 1), '')imagen
		FROM servicios s where s.activo = 1
		and s.idCategoria = {$idCategoria};");
		return $usuarios;
	}

	public function getOne(){
		$usuario = $this->db->query("SELECT s.id, s.nombre, s.descripcion, IFNULL(si.imagen,'') imagen FROM servicios s
			left join servicios_imagen si on s.id = si.idServicio and si.activo = 1
		WHERE s.id = {$this->getId()}
		limit 1;
		");

		return $usuario->fetch_object();
	}
}
