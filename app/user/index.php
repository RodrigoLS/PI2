<?php  
	include('../db/bancodedados.php');
	include('../auth/controle.php');

	//Funcionalidade LISTAR

	$q = odbc_exec($db, 'SELECT idUsuario, loginUsuario, nomeUsuario, tipoPerfil, usuarioAtivo FROM Usuario');

	$i = 0;
	while ($r = odbc_fetch_array($q)) {
		
		$usuarios[$r['idUsuario']] = $r;

		$i++;
	}
	//FIM FUNCIONALIDADE LISTAR

	include('template.php');
?>