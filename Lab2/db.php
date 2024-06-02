<?php 

function getMaterias(){

    $db = new PDO('mysql:host=localhost;'
.'dbname=db_lab2;charset=utf8'
, 'root', '');

$sentencia = $db->prepare( "select * from materia");
$sentencia->execute();
$materias = $sentencia->fetchAll(PDO::FETCH_OBJ);

return $materias;
}

function addMateria($nombre, $profesor){
    $db = new PDO('mysql:host=localhost;dbname=db_lab2;charset=utf8', 'root', '');

    $sentencia = $db->prepare(" INSERT INTO materia (nombre, profesor) values(?,?)");
    $sentencia ->execute([$nombre, $profesor]);

    return $db ->lastInsertId();

}

function buscarMateria($nombre){
    $db = new PDO('mysql:host=localhost;dbname=db_lab2;charset=utf8', 'root', '');

    $sentencia = $db->prepare("SELECT * FROM materia WHERE nombre LIKE ?");
    $sentencia ->execute(["%$nombre%"]);

    return $sentencia->fetchAll(PDO::FETCH_OBJ);
}