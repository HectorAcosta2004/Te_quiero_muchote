<?php
//credenciales para la base de datos
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "soporte_unav";

//conexion ala base de datos
$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("La conexión a la base de datos falló:  " . $conn->connect_error);
}
if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];

    if (empty($_POST['id'])) {//inserta la informacion 
        $sql = "INSERT INTO user (name, email) VALUES ('$name', '$email')";
    } else {//actualiza la informacion
        $id = $_POST['id'];
        $sql = "UPDATE user SET name='$name', email='$email' WHERE id=$id";
    }

    if ($conn->query($sql) === TRUE) {
        echo "Operación exitosa";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];//elimina la informacion
    $sql = "DELETE FROM user WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Registro eliminado exitosamente";
    } else {
        echo "Error al eliminar el registro: " . $conn->error;
    }
}

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];//seleccionar informacion
    $result = $conn->query("SELECT * FROM user WHERE id=$id");
    $row = $result->fetch_assoc();
    echo json_encode($row);
}

$conn->close();//cierra la conexion ala BD
?>
