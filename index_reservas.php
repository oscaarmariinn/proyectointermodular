<?php
require_once "autoloader.php";
$reserva = new Model();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_POST['nombre']) && isset($_POST['personas']) && isset($_POST['fecha']) && isset($_POST['zona_id'])){
        $aforo = $reserva->getAforo($_POST['zona_id']);
        $fecha = $_POST['fecha'];
        $id = $_POST['zona_id'];
        $suma_zona= $reserva->getSuma($fecha,$id);
        $num_personas= $_POST['personas'];
        $nombre_reserva = $_POST['nombre'];
        $mensaje = $reserva->hacerReserva($aforo, $suma_zona, $num_personas,$id,$fecha,$nombre_reserva);
        
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas</title>
    <link rel="icon" type="image/jpg" href="logo.ico"/>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <header>
        <h1>
            Restaurante Dialados
        </h1>
        
            <nav>
                <div id="opciones_nav">
                    <div><a href="index.html">Inicio</a></div>
                    <div><a href="index_reservas.php">Reservas</a></div>
                    <div><a href="contacto.html">Contacto</a></div>
                </div>
                <div class="logo"><img src="logo.png"></div>
            </nav>
    </header>
    <div class="cuerpo">
        <div class="formulario">
            <h2 style="color: black; text-shadow: 5px 5px 5px gray;">Reservar Mesa</h2>
            <form method="POST">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="personas">Nº de Personas:</label>
            <input type="number" id="personas" name="personas" min="1" required>

            <label for="fecha">Fecha:</label>
            <input type="date" id="fecha" name="fecha" required>

            <label for="zona">Zona:</label>
            <select id="zona" name="zona_id" required>
                <option value="1">Interior</option>
                <option value="2">Terraza</option>
            </select>

            <button type="submit">Reservar</button>
            </form>
        </div>
        <?php
        if (isset($mensaje)){
            echo $mensaje;
        }
        ?>
    </div>
    <footer>
        <p>© Copyright 2025. Dialados Restaurante</p>
    </footer>

</body>

</html>