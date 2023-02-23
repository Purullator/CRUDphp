<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <title>Crear Libro</title>
</head>
<body>

    <h1>Formulario de creación de un libro nuevo</h1>

    <nav>
        <a href="displaylibros.php">Todos los libros</a>
        <a href="displaytable.php">Todos los socios</a>
        <a href="displayprestamos.php">Prestamos de socios</a>
    </nav>

    <div class="flex-container flex1"> 
    <form method="POST" autocomplete="OFF" class="newLibro">
        <legend>Crear Libro Nuevo</legend>
        <div class="form-group"> 
        <label>ISBN:</label>
        <input type="text" name="isbn" required>
        </div>
        <div class="form-group">
        <label>Título:</label>
        <input type="text" name="titulo" required>
        </div>
        <div class="form-group">
        <label>Editorial:</label>
        <input type="text" name="editorial" required>
        </div>
        <div class="form-group">
        <label>Idioma:</label>
        <input type="text" name="idioma" required>
        </div>
        <div class="form-group">
        <label>Autor:</label>
        <input type="text" name="autor" required>
        </div>
        <div class="form-group">
        <label>Ediciones:</label>
        <input type="number" name="ediciones" required>
        </div>
        <div class="form-group">
        <label>Edad Recomendada:</label>
        <input type="number" name="edadrecomendada">
        </div>
        <div class="form-control-file">
        <label>Portada:</label>
        <input type="file" name="portada" accept="image/*">
        </div>
        <input type="submit" name="crear" value="Crear Libro" class="btn btn-primary">

    </form>
    </div>
    <?php


    if(!empty($_POST['crear'])) {

        $conexion = new mysqli('localhost', 'root', '', 'biblioteca');
        $conexion->set_charset('utf8');

        $isbn = $_POST['isbn'];
        $tit = $_POST['titulo'];
        $edit = $_POST['editorial'];
        $idi = $_POST['idioma'];
        $aut = $_POST['autor'];
        $edic = $_POST['ediciones'];
        $edadrec = $_POST['edadrecomendada'];
        $port = $_POST['portada'] ?? 0;

        $consulta = "INSERT INTO libros(id, isbn, titulo, editorial, idioma, autor, ediciones, edadrecomendada, portada)
                  VALUES(DEFAULT, '$isbn', '$tit', '$edit', '$idi', '$aut', '$edic', '$edadrec', '$port')";

        echo $conexion->query($consulta)? 'Guardado OK' : 'No se pudo guardar!';

    }

    ?>
</body>
</html>