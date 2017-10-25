<?php
	include('../db/bancodedados.php');
	include('../auth/controle.php');

	//Funcionalidade Gravar Cadastro
	if(isset($_POST['btnGravar'])){
		unset($_GET['cadastrar']);
		if(	!empty($_POST['loginUsuario']) && !empty($_POST['nomeUsuario']) && !empty($_POST['senhaUsuario'])){
			$_POST['usuarioAtivo'] = isset($_POST['usuarioAtivo']) ? 1 : 0;
			
			$_POST['usuarioAtivo'] = (int) $_POST['usuarioAtivo'];
		
			$_POST['nomeUsuario'] = utf8_decode($_POST['nomeUsuario']);
			$_POST['senhaUsuario'] = utf8_decode($_POST['senhaUsuario']);	

			$stmt = odbc_prepare($db, "	INSERT INTO Usuario
											(loginUsuario,
											nomeUsuario,
											senhaUsuario,
											tipoPerfil,
											usuarioAtivo)
										VALUES
											(?,?,?,?,?)");

			if(odbc_execute($stmt, array(	$_POST['loginUsuario'],
											$_POST['nomeUsuario'],
											$_POST['senhaUsuario'],
											$_POST['perfilUsuario'],
											$_POST['usuarioAtivo'],))){
				$msg = 'Usuário gravado com sucesso!';			
			} else{
				$erro = 'Erro ao gravar o usuário';
			}								
							
		} else{
		
			$erro = 'Os campos: Login, Nome e Senha são obrigatórios';
		
		}
	}
//FIM Funcionalidade Gravar Cadastro
//Funcionalidade Editar Cadastro
if(isset($_POST['btnAtualizar'])){
		unset($_GET['editar']);
		if(	!empty($_POST['loginUsuario']) && !empty($_POST['nomeUsuario'])){
			
			
			$_POST['usuarioAtivo'] = 
			isset($_POST['usuarioAtivo']) ? 1 : 0;
		
			$_POST['usuarioAtivo'] = (int) $_POST['usuarioAtivo'];
		
			$_POST['nomeUsuario'] = utf8_decode($_POST['nomeUsuario']);
			$_POST['senhaUsuario'] = utf8_decode($_POST['senhaUsuario']);

		//Se não for informada nova senha, mantém a antiga
		if(empty($_POST['senhaUsuario'])){
			$stmt = odbc_prepare($db, "	UPDATE 
											Usuario
										SET 
											loginUsuario = ?,
											nomeUsuario = ?,
											tipoPerfil = ?,
											usuarioAtivo = ?
										WHERE
											idUsuario = ?");
										
			if(odbc_execute($stmt, array(	$_POST['loginUsuario'],
											$_POST['nomeUsuario'],
											$_POST['perfilUsuario'],
											$_POST['usuarioAtivo'],
											$_POST['idUsuario']))){
				$msg = 'Usu&aacute;rio atualizado com sucesso!';			
			}else{
				$erro = 'Erro ao atualizar o usu&aacute;rio';
			}
		//Se for informada nova senha, altere	
		}else{	
		
			$stmt = odbc_prepare($db, "	UPDATE 
											Usuario
										SET 
											loginUsuario = ?,
											nomeUsuario = ?,
											senhaUsuario = ?,
											tipoPerfil = ?,
											usuarioAtivo = ?
										WHERE
											idUsuario = ?");
										
			if(odbc_execute($stmt, array(	$_POST['loginUsuario'],
											$_POST['nomeUsuario'],
											$_POST['senhaUsuario'],
											$_POST['perfilUsuario'],
											$_POST['usuarioAtivo'],
											$_POST['idUsuario']))){
				$msg = 'Usuário atualizado com sucesso!';			
			} else{
				$erro = 'Erro ao gravar o usuário';
			}								
			
			}				
		} else{
		
			$erro = 'Erro ao atualizar o usuário';
		
		}
	}

//FIM Funcionalidade Editar Cadastro
//Funcionalidade Listar

if (isset($_GET['consulta'])) {
		$pesquisar = $_GET['consulta'];
		
		$q = odbc_exec($db, "SELECT idUsuario, loginUsuario, nomeUsuario, tipoPerfil, usuarioAtivo
							 FROM Usuario 
							 WHERE loginUsuario = '$pesquisar' OR nomeUsuario = '$pesquisar' ");

		while($r = odbc_fetch_array($q)) {
			$usuarios[$r['idUsuario']] = $r;
		}

		unset($_GET['consulta']);
} else {

	$q = odbc_exec($db, 'SELECT idUsuario, loginUsuario, nomeUsuario, tipoPerfil, usuarioAtivo
					 FROM Usuario');

	while($r = odbc_fetch_array($q)){
	
		$usuarios[$r['idUsuario']] = $r;
	}
}

//FIM Funcionalidade Listar

if(isset($_GET['cadastrar'])){//FORM Cadastrar

	include('template_cadastrar.php');
	
}elseif(isset($_GET['editar'])){//FORM Editar

	if(is_numeric($_GET['editar'])){
		$q = odbc_exec($db, "	SELECT 	idUsuario, loginUsuario,
										nomeUsuario, tipoPerfil, 
										usuarioAtivo
								FROM Usuario 
								WHERE idUsuario = {$_GET['editar']}");
		$dados_usuario = odbc_fetch_array($q);
	}else{
		$erro = 'Código inválido';
	}

	include('template_editar.php');
	
}else{//FORM Listar

	include('template.php');
	
}

// consulta para apagar 
	if(isset($_GET['apagar'])){
		if(is_numeric($_GET['apagar'])){
			
			if(odbc_exec($db, "	DELETE 
								FROM 
									Usuario 
								WHERE 
									idUsuario = {$_GET['apagar']}")){	
				$apagar_msg = 'Registro apagado com sucesso!';	
				header("location:index.php");					
			}else{
				$apagar_msg = 'Erro ao apagar o registro';
			}	
		}	
	}


?>