<?php 

function getClientes(){

    $db = new PDO('mysql:host=localhost;'
.'dbname=bd_lab1;charset=utf8'
, 'root', '');

$sentencia = $db->prepare( "select * from clientes");
$sentencia->execute();
$clientes = $sentencia->fetchAll(PDO::FETCH_OBJ);

return $clientes;
}

function addClientes($deudor, $cuota, $cuota_capital, $fecha_pago){
    $db = new PDO('mysql:host=localhost;dbname=bd_lab1;charset=utf8', 'root', '');

    $sentencia = $db->prepare(" INSERT INTO clientes (deudor, cuota, cuota_capital, fecha_pago) values(?,?,?,?)");
    $sentencia ->execute([$deudor, $cuota, $cuota_capital, $fecha_pago]);

    return $db ->lastInsertId();

}