<?php
class Producto{
	private $nombreProducto;
	private $precio;
	private $empresa;
	private $descripcion;
	private $disponibles;
	private $imagen;
	private $comentarios;
	private $calificacion;
	private $inicioPromocion;
	private $finPromocion;

	public function __construct(
		$nombreProducto,
		$precio,
		$empresa,
		$descripcion,
		$disponibles,
		$imagen,
		$comentarios,
		$calificacion,
		$promocion,
		$inicioPromocion,
		$finPromocion
	){
		$this->nombreProducto = $nombreProducto;
		$this->precio = $precio;
		$this->empresa = $empresa;
		$this->descripcion = $descripcion;
		$this->disponibles = $disponibles;
		$this->imagen = $imagen;
		$this->comentarios = $comentarios;
		$this->calificacion = $calificacion;
		$this->promocion = $promocion;
		$this->inicioPromocion = $inicioPromocion;
		$this->finPromocion = $finPromocion;
	}

	public function __toString(){
		$var = "Producto{"
		."nombreProducto: ".$this->nombreProducto." , "
		."precio: ".$this->precio." , "
		."empresa: ".$this->empresa." , "
		."descripcion: ".$this->descripcion." , "
		."disponibles: ".$this->disponibles." , "
		."imagen: ".$this->imagen." , "
		."comentarios: ".$this->comentarios." , "
		."calificacion: ".$this->calificacion." , "
		."promocion: ".$this->promocion." , "
		."inicioPromocion: ".$this->inicioPromocion." , "
		."finPromocion: ".$this->finPromocion;
		return $var."}";
	}

	public function getNombreProducto(){
		return $this->nombreProducto;
	}

	public function setNombreProducto($nombreProducto){
		$this->nombreProducto = $nombreProducto;
	}
	public function getPrecio(){
		return $this->precio;
	}

	public function setPrecio($precio){
		$this->precio = $precio;
	}
	public function getEmpresa(){
		return $this->empresa;
	}

	public function setEmpresa($empresa){
		$this->empresa = $empresa;
	}
	public function getDescripcion(){
		return $this->descripcion;
	}

	public function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
	}
	public function getDisponibles(){
		return $this->disponibles;
	}

	public function setDisponibles($disponibles){
		$this->disponibles = $disponibles;
	}
	public function getImagen(){
		return $this->imagen;
	}

	public function setImagen($imagen){
		$this->imagen = $imagen;
	}
	public function getComentarios(){
		return $this->comentarios;
	}

	public function setComentarios($comentarios){
		$this->comentarios = $comentarios;
	}
	public function getCalificacion(){
		return $this->calificacion;
	}

	public function setCalificacion($calificacion){
		$this->calificacion = $calificacion;
	}
	
	public function getPromocion(){
		return $this->promocion;
	}

	public function setPromocion($promocion){
		$this->promocion = $promocion;
	}

	public function getInicioPromocion(){
		return $this->inicioPromocion;
	}

	public function setInicioPromocion($inicioPromocion){
		$this->inicioPromocion = $inicioPromocion;
	}
	public function getFinPromocion(){
		return $this->finPromocion;
	}

	public function setFinPromocion($finPromocion){
		$this->finPromocion = $finPromocion;
	}

}
?>