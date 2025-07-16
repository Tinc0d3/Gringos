<?php
    // Primero creamos las variables
    $servidor = 'localhost';
    $usuario = 'root';
    $contraseña = '';
    $base_de_datos = 'gringos';
    
    // Creamos la conexión a la BD
    $conexion = mysqli_connect($servidor, $usuario, $contraseña, $base_de_datos);
        
    // Verificamos si la conexión fue exitosa
    if (!$conexion) {
        die("Conexión fallida: " . mysqli_connect_error()); //Si la conexión falla muestra un mensaje de error y se termina la ejecución
    }

    // Ejecutamos la consulta a la BD utilizando la función mysqli_query
    $sql = "SELECT * FROM usuarios"; //Creamos la consulta SQL
    $resultado = mysqli_query($conexion, $sql); // Ejecutamos la consulta y guardamos el resultado en una variable

    // Verificamos si la consulta tuvo resultados
    if (mysqli_mum_rows($resultado) > 0) {
        // Si la consulta tuvo resultados, los mostramos en la página web
        while($fila = mysqli_fetch_assoc($resultado)) {
            echo "ID: " . $fila["id"] . " - Nombre: " . $fila["user"] . " -Contraseña: " .$fila["pass"]  }
    }
?>