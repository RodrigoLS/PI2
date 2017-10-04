<?php

$db_host = "rodrigolima.database.windows.net";
$db_name = "PI2";
$db_user = "Rodrigo__Lima";
$db_pass = "585119471998Jose*";
$dsn = "Driver={SQL Server};Server=$db_host;Port=1433;Database=$db_name;";

if(!$db = odbc_connect($dsn, $db_user, $db_pass)){

		echo "ERRO AO CONECTAR AO BANCO DE DADOS";
		exit();
}		
?>