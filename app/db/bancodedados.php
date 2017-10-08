<?php

$db_host = "bar100lona.database.windows.net";
$db_name = "bar100lona";
$db_user = "hippo";
$db_pass = "Bar100lona";
$dsn = "Driver={SQL Server};Server=$db_host;Port=1433;Database=$db_name;";

if(!$db = odbc_connect($dsn, $db_user, $db_pass)){

		echo "ERRO AO CONECTAR AO BANCO DE DADOS";
		exit();
}		
?>