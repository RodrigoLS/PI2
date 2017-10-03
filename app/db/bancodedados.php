<?php

$db_host = "pi-2-marcelo.database.windows.net";
$db_name = "PI-Marcelo";
$db_user = "marcelob133";
$db_pass = "SenhaDoBanco";
$dsn = "Driver={SQL Server};Server=$db_host;Port=1433;Database=$db_name;";

if(!$db = odbc_connect($dsn, $db_user, $db_pass)){

		echo "ERRO AO CONECTAR AO BANCO DE DADOS";
		exit();
}		
?>