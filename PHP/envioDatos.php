<?php

class EnvioDatos {

	private $conexion;

	function __construct(){

		require_once("conexion.php");
		$this->conexion = new conexion();
		$this->conexion->conectar();
	}

	public function ingresar_datos($posYJug1_php, $posYJug2_php, $posXbol_php, $posYbol_php){

		$sql = " insert into movimientos values (null, ?, ?, ?, ?) ";
		$stmt = $this->conexion->conexion->prepare($sql);

		$stmt->bindValue(1, $posYJug1_php);
		$stmt->bindValue(2, $posYJug2_php);
		$stmt->bindValue(3, $posXbol_php);
		$stmt->bindValue(4, $posYbol_php);

		if($stmt->execute()){
			echo "Ingreso Exitoso";
		}else{
			echo "No se pudo registrar datos";
		}
	}
}

?>