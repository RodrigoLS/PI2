<?php

$db_host = "hippo-pi.database.windows.net";
$db_name = "hippo";
$db_user = "tsi";
$db_pass = "SistemasInternet123";
$dsn = "Driver={SQL Server};Server=$db_host;Port=1433;Database=$db_name;";

if(!$db = odbc_connect($dsn, $db_user, $db_pass)){

		echo "ERRO AO CONECTAR AO BANCO DE DADOS";
		exit();
}		
?>