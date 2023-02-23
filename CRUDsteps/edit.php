<?php
    require_once 'config.php';

    // If the form is submitted, update the libro record

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id = $_POST['id'];
        $isbn = $_POST['isbn'];
        $tit = $_POST['titulo'];
        $edit = $_POST['editorial'];
        $idi = $_POST['idioma'];
        $aut = $_POST['autor'];
        $edic = $_POST['ediciones'];
        $edadrec = $_POST['edadrecomendada'];
        $port = $_POST['portada'] ?? 0;
        

        $sql = "UPDATE libros SET isbn = '$isbn', titulo = '$tit', editorial = '$edit', 
                                  idioma = '$idi', autor = '$aut', ediciones = '$edic', 
                                  edadrecomendada = '$edadrec', portada = '$port'
                WHERE id = $id";

        echo $conn->query($sql)? "Guardado OK" : "No se pudo guardar";
    }

    // If the libro id is provided in the query string, retrieve the libro record

    if (isset($_REQUEST["id"])) {
        $id = $_REQUEST["id"];
        $sql = "SELECT * FROM libros WHERE id = $id";
        $result = $conn->query($sql);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
        } else {
            echo "Libro not found";
            exit;
        }
    } else {
        echo "Libro id not provided";
        exit;
    }

    mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css">
    <title>Edit View</title>
</head>
<body>

<h1>Vista de Edición de Libros</h1>

    <nav>
        <a href="displaylibros.php">Lista de Libros</a>
        <a href="displaytable.php">Lista de socios</a>
        <a href="newlibro.php">Crear Libro Nuevo</a>
        <a href="displayprestamos.php">Prestamos de socios</a>
    </nav>

<div class="flex-container flex1"> 
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="newLibro">
        <legend>Editar Libro</legend>
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label>ISBN:</label>
        <input type="text" name="isbn" required value="<?php echo $row['isbn']; ?>">
        <br>
        <label>Título:</label>
        <input type="text" name="titulo" required value="<?php echo $row['titulo']; ?>">
        <br>
        <label>Editorial:</label>
        <input type="text" name="editorial" required value="<?php echo $row['editorial']; ?>">
        <br>
        <label>Idioma:</label>
        <input type="text" name="idioma" required value="<?php echo $row['idioma']; ?>">
        <br>
        <label>Autor:</label>
        <input type="text" name="autor" required value="<?php echo $row['autor']; ?>">
        <br>
        <label>Ediciones:</label>
        <input type="number" name="ediciones" required value="<?php echo $row['ediciones']; ?>">
        <br>
        <label>Edad Recomendada:</label>
        <input type="number" name="edadrecomendada" value="<?php echo $row['edadrecomendada']; ?>">
        <br>
        <label>Portada:</label>
        <input type="file" name="portada" accept="image/*" value="<?php echo $row['portada']; ?>">
        <br>
        <input type="submit" name="editar" value="Editar Libro" class="btn btn-primary">

    </form>
</div>


</body>
</html>