<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="style.css" />
    <title>SELECTS</title>
</head>
<body>

<h1>Tabla de todos los socios de la biblioteca</h1>
<nav>
    <a href="displaylibros.php">Lista de libros</a>
    <a href="newlibro.php">Libro Nuevo</a>
    <a href="displayprestamos.php">Prestamos de socios</a>
</nav>

<?php
   require_once 'config.php';
   
        $sql = "SELECT * FROM socios";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            
            echo "<table class='table table-dark'><tr>";
            while ($fieldinfo = mysqli_fetch_field($result)) {
                echo "<th class='col tableHead'>" . $fieldinfo->name . "</th>";
            }
            echo "</tr>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr class=''>";
                foreach ($row as $col) {
                    echo "<td class='col'>" . $col . "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }

    
    mysqli_close($conn);
?>
    
</body>
</html>