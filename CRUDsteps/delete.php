<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Delete View</title>
</head>
<body>
<?php require_once 'config.php'; ?>
<?php

    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $sql = "DELETE FROM libros WHERE id = $id";
        if (mysqli_query($conn, $sql)) {
            echo "Libro deleted successfully";
        } else {
            echo "Error deleting libro: " . mysqli_error($conn);
        }
    } else {
        echo "Libro id not provided";
        exit;
    }

    mysqli_close($conn);
?>

    <h1>Vista para eliminar libro</h1>

    <nav>
        <a href="displaylibros.php">Lista de Libros</a>
        <a href="displaytable.php">Lista de socios</a>
        <a href="newlibro.php">Crear Libro Nuevo</a>
        <a href="displayprestamos.php">Prestamos de socios</a>
    </nav>

    <div class="flex-container flex1 redMes"> 
    <meta http-equiv="refresh" content="5;URL=displaylibros.php">
    <p>Redirecting to displaylibros.php in 5 seconds...</p>
    </div>

</body>
</html>