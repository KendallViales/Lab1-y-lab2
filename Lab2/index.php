<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        ul {
            list-style-type: none;
        }
        li {
            margin-bottom: 10px;
        }
    </style>

</head>
<body>

<?php
require_once 'db.php';

function listarMaterias(){

    $materias = getMaterias();

    echo '<table border="1">';
    echo '<tr><th>ID</th><th>Nombre</th><th>Profesor</th></tr>';
    foreach($materias as $materia) {
        echo '<tr><td>' .$materia->id. '</td><td>' .$materia->nombre. '</td><td>' .$materia->profesor. '</td></tr>';
    }
    echo'</table>';
}

listarMaterias();

if($_SERVER ['REQUEST_METHOD'] == 'POST'){
    if (isset($_POST['nombre'], $_POST['profesor'])) {
        $nombre = $_POST['nombre'];
        $profesor = $_POST['profesor'];

        addMateria($nombre, $profesor);
        header('location: index.php');
    } elseif (isset($_POST['buscar'])) {
        $nombre = $_POST['buscar'];
        $materias = buscarMateria($nombre);

        echo '<ul>';
        foreach($materias as $materia) {
            echo '<li>' .$materia->id, $materia -> nombre, $materia -> profesor. '</li>';
        }
        echo'</ul>';
    }
}
    
?>

<form action="index.php" method="post">
    <div>
    <label for="nombre">nombre</label>
    <input type="text" name="nombre">
    </div>

    <div>
        <label for="profesor">profesor</label>
        <input type="text" name="profesor">

    </div>

    <button type="submit">Agregar</button>
    
</form>

<form action="index.php" method="post">
    <div>
    <label for="buscar">Buscar materia:</label>
    <input type="text" name="buscar">
    </div>

    <button type="submit">Buscar</button>
    
</form>

</body>
</html>