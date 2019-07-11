<?php 

	/*$user = "root";
	$pass = "";
	$server = "localhost";
	$db = "db_arduino";

	$con = new mysqli($server, $user, $pass, $db);
	
	if ($con -> connect_errno) {
		echo "DB No conectado";
	}else{
		echo  "DB Conectado";
	}*/
	class conexion {

	private $servidor;
	private $usuario;
	private $contrasena;
	private $basedatos;
	public $conexion;
	public $con;

	public function __construct(){
		$this->servidor   = "localhost";
		$this->usuario	  = "id9881348_josnow";
		$this->contrasena = "p0ng123";
		$this->basedatos  = "id9881348_db_pong";
	}

	function conectar(){
		$this->conexion = new PDO("mysql:host=$this->servidor;dbname=$this->basedatos","$this->usuario","$this->contrasena");
		$this->con = new mysqli($this->servidor, $this->usuario, $this->contrasena, $this->basedatos);
	}
	
	function cerrar(){
		$this->conexion->close();
	}
}

?>