<?php

require("class.pdofactory.php");

// Establecer conexión PDO
$strDSN = "pgsql:dbname=usuaris;host=localhost;port=5432;user=postgres;password=root";
$objPDO = new PDO($strDSN);
$objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Verificar el parámetro de consulta
$queryNumber = isset($_GET['query']) ? $_GET['query'] : null;

try {
    // Comenzar la transacción
    $objPDO->beginTransaction();

    if ($queryNumber === '1') {
        // Primera inserción que funciona
        $strQuery1 = "INSERT INTO Customer (id, store_id, first_name, last_name, email, address_id) VALUES (
        DEFAULT, 1, 'David1', 'Escalona1', 'escalona@example.com', 1)";
        $objPDO->exec($strQuery1);
        echo "La primera inserción funcionó correctamente.<br/>";
    } elseif ($queryNumber === '2') {
        // Segunda inserción que falla (provocamos el error intencionalmente)
        $strQuery2 = "INSERT INTO Customer (id, store_id, first_name, last_name, email, address_id) VALUES (
        DEFAULT, 1, 'David2', 'Escalona2', 'escalona2@example.com', 'ValorInvalido')"; // Simulación de un valor inválido que causará un error
        $objPDO->exec($strQuery2);
        echo "La segunda inserción funcionó correctamente.<br/>"; // Esto no se mostrará si la inserción falla
    }

    // Confirmar la transacción
    $objPDO->commit();

} catch (PDOException $e) {
    // Si ocurre un error, revertir la transacción y manejar la excepción
    $objPDO->rollBack();

    // Crear un archivo para indicar que la operación no se realizó correctamente
    $file = fopen("operacion_fallida.txt", "w");
    fwrite($file, "La operación no se realizó correctamente. Mensaje de error: " . $e->getMessage());
    fclose($file);

    echo "La inserción no se pudo realizar. Se ha creado un archivo 'operacion_fallida.txt'.";
}
?>




