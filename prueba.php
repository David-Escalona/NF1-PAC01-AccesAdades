<?php

require("class.pdofactory.php");
print "Running...<br/>";

$strDSN = "pgsql:dbname=usuaris;host=localhost;port=5432;user=postgres;password=root";
$objPDO = new PDO($strDSN);
$objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try {

    $queryNumber = $_GET['query'] ?? '';

    if ($queryNumber === '1') {
        echo "Guardando los datos 1...<br/>";
        $strQuery = "INSERT INTO Customer (id, store_id, first_name, last_name, email, address_id) VALUES (
        DEFAULT, 1, 'David1', 'Escalona1', 'escalona@example.com', 1)";
    } elseif ($queryNumber === '2') {
        echo "Guardando los datos 2...<br/>";
        $strQuery = "INSERT INTO Customer (id, store_id, first_name, last_name, email, address_id) VALUES (
        DEFAULT, 1, 'David2', 'Escalona2', 'escalona2@example.com', 1)";
    } else {
        throw new Exception("No se proporcionó un valor válido para el parámetro 'query'.");
    }

    $objPDO->beginTransaction();

    $objPDO->exec($strQuery);

    // commit the transaction
    $objPDO->commit();

} catch (Exception $e) {

    // rollback the transaction
    $objPDO->rollBack();
    echo "Failed: ".$e->getMessage();
}
?>
