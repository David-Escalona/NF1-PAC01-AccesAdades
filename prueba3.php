<?php

require("class.pdofactory.php");

$strDSN = "pgsql:dbname=usuaris;host=localhost;port=5432;user=postgres;password=root";
$objPDO = new PDO($strDSN);
$objPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try {
    echo "<br>";
    $strQuery1 = "Select * from Customer where id=".$_GET["id"];
    echo $strQuery1;
     $stm = $objPDO->query($strQuery1);
    $mydata = $stm->fetch();
    echo "<br>Hola ".$mydata[1]."!";

} catch (Exception $e) {
    echo "Failed: ".$e->getMessage();
}
