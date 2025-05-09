<?php

 class Model extends Connection{

    public function getAllReservas(){

        $sql = "SELECT reserva.id_reserva, reserva.personas, reserva.zona, reserva.fecha, reserva.nombre
                FROM reserva ORDER BY reserva.id_mesa";

        return $this->conn->query($sql);
    }

    public function getAforo($id){
        
        $sql= "SELECT aforo FROM zona WHERE id_zona = $id";

        $stmt = $this->conn->query($sql);
        $output;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $output = (int)$row['aforo'];
        }

        return $output;

    }
    public function getSuma($fecha, $id){
         
        $sql= "SELECT SUM(reserva.personas) as personas FROM reserva INNER JOIN zona ON reserva.zona = zona.id_zona WHERE reserva.fecha = '$fecha' AND zona.id_zona = $id";

        $stmt = $this->conn->query($sql);

        $output;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            $output = (int)$row['personas'];
        }
        return $output;

    }
    public function hacerReserva($aforo, $suma_zona, $num_personas,$id,$fecha,$nombre_reserva){
        $output;
        if ($aforo - $suma_zona > 0) { //Si que hay espacio disponible
            if ($suma_zona + $num_personas <= $aforo){ //el num_persones si que cap en l'afotrament del local
                $sql= "INSERT INTO reserva (id_reserva, nombre, zona, fecha, personas)  VALUES(default,'$nombre_reserva',$id,'$fecha',$num_personas)";
                $count = $this->conn->exec($sql);
                if($count == 1)
                $output = "<div class= 'telefono'>Mesa reservada</div>";
                else 
                $output = "<div class= 'telefono'>Ha habido un error con el sistema</div>";
            }else{
                $output = "<div class= 'telefono'>El numero de personas (" .$num_personas. ") es mayor que el aforo disponible</div>";
            }

        }else{
           return  $output = "<div class= 'telefono'>Mesa no reservada, aforo completo</div>";
        }
        
        return $output;
    }

}