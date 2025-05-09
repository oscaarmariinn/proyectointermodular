<?php
class Reserva {
    private $reservaId;
    private $reservaPersonas;
    private $reservaZona;
    private $reservaFecha;
    private $reservaNombre;
   

    public function __construct($reservaId, $reservaPersonas, $reservaZona, $reservaFecha, $reservaNombre) {
        $this->reservaId = $reservaId;
        $this->reservaPersonas7 = $reservaPersonas;
        $this->reservaZona = $reservaZona;
        $this->reservaFecha = $reservaFecha;
        $this->$reservaNombre = $reservaNombre;
    }

    public function getReservaId(){
        return $this->reservaId; 
    }
    public function getReservaPersonas(){
        return $this->reservaPersonas;
    }
    public function getReservaZona(){
        return $this->reservaZona; 
    }
    public function getReservaFecha(){ 
        return $this->reservaFecha; 
    }
    public function getReservaNombre(){ 
        return $this->reservaNombre; 
    }

}
?>