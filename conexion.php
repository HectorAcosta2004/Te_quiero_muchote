<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "soporte_unav";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
echo "CONEXION EXITOSA" ;

$sql = "SELECT matricula, pasword FROM user";
$result = $conn->query($sql);

// Mostrar resultados en formato HTML
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
     
         echo "matricula " . $row["matricula"]. " - pasword: " . $row["pasword"]. "<br>";
    }
} else {
    echo "0 resultados";
}

// Cerrar conexión
$conn->close();
?>
