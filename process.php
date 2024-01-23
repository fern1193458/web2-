<?php
// Conexión a la base de datos (reemplaza con tus propios datos)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "concurso";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}else{
    echo "te has conectado ";
}

// Recibe datos del formulario
$documento = $_POST['documento'];
$nombre = $_POST['nombre'];
$edad = $_POST['edad'];
$semestre = $_POST['semestre'];
$lenguaje = $_POST['lenguaje'];

// Inserta datos en la tabla
$sql = "INSERT INTO participantes (documento, nombre, edad, semestre, lenguaje) 
        VALUES ('$documento', '$nombre', '$edad', '$semestre', '$lenguaje')";

if ($conn->query($sql) === TRUE) {
    // Muestra el mensaje de confirmación con una imagen de fondo
    echo '
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
            <style>
                body {
                    background: linear-gradient(to bottom, #3498db, #2980b9); 
                    background-position: center;
                    color: #fff;
                    text-align: center;
                    padding-top: 100px;
                }
            </style>
            <title>Confirmación de Inscripción</title>
        </head>
        <body>
            <div class="container">
            <br>
            <br>
            <br>
            <br>
                <h2>¡Datos guardados correctamente!</h2>
                <p>Haz quedado inscrito en el concurso.</p>
                <a href="index.html" class="btn btn-primary">Volver</a>
            </div>
        </body>
        </html>
    ';
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cierra la conexión
$conn->close();
?>
