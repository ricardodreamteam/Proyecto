<?php
class Juego 
{
    public $titulo;
    public $precio;
    public $cantidad;
    public $serial;

    
    public function __construct() {  
      

  }

    
    //SETTERS
    public function setCantidad($cantidad){
        $this->cantidad=$cantidad;
    }
    public function setTitulo($titulo){
      $this->titulo=$titulo;
  }
  public function setPrecio($precio){
    $this->precio=$precio;
}
   //GETTTERS
    public function getTitulo(){
        return $this->titulo;
    }
    public function getPrecio(){
        return $this->precio;
    }
    public function getCantidad(){
        return $this->cantidad;
    }

    //Metodos
    public function sumarCantidad(){
        $this->cantidad++;
    }

    //sobrecarga del metodo _equals para que "in_array" de addCarro.php funcione correctamente
    public function __equals($other){
        if ($other instanceof Juego){
          $resultado = $this->titulo == $other->titulo;
        }

        return $resultado;
      }
   

}
?>