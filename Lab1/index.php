    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>

    <?php
    require_once 'db.php';

    function listarClientes(){

        $clientes = getClientes();
    
        echo '<table border="1">';
        echo '<tr><th>ID</th><th>Deudor</th><th>Cuota</th><th>Cuota Capital</th><th>Fecha de Pago</th></tr>';
        foreach($clientes as $cliente) {
            echo '<tr><td>' .$cliente->id. '</td><td>' .$cliente->deudor. '</td><td>' .$cliente->cuota. '</td><td>' .$cliente->cuota_capital. '</td><td>' .$cliente->fecha_pago. '</td></tr>';
        }
        echo'</table>';
    }

    listarClientes();

    if($_SERVER ['REQUEST_METHOD'] == 'POST'){
        $deudor = $_POST['deudor'];
        $cuota = $_POST['cuota'];
        $cuota_capital = $_POST['cuota_capital'];
        $fecha_pago = $_POST['fecha_pago'];

        addClientes($deudor, $cuota, $cuota_capital, $fecha_pago);
        header('location: index.php');
    }
        
    ?>

    <form action="index.php" method="post">
        <div>
        <label for="deudor">deudor</label>
        <input type="text" name="deudor">
        </div>

        <div>
            <label for="cuota">cuota</label>
            <input type="text" name="cuota">

        </div>

        <div>
            <label for="cuota_capital">cuota_capital</label>
            <input type="text" name="cuota_capital">
        </div>

        <div>
            <label for="fecha_pago">fecha_pago</label>
            <input type="text" name="fecha_pago">
        </div>

        <button type="submit">Agregar</button>
        
    </form>

    </body>
    </html>