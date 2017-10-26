<?php
	ini_set('odbc.defaultlrl', 90000000);

	include('../db/bancodedados.php');
	include('../auth/controle.php');

	//Funcionalidade Gravar Cadastro
	if(isset($_POST['btnGravar'])){
		unset($_GET['cadastrar']);
		if(	!empty($_POST['loginUsuario']) && !empty($_POST['nomeUsuario']) && !empty($_POST['senhaUsuario'])){
			$_POST['usuarioAtivo'] = isset($_POST['usuarioAtivo']) ? true : false;
		
			$stmt = odbc_prepare($db, "	INSERT INTO Produto
											(nomeProduto,
											descProduto,
											precProduto,
											descontoPromocao,
											idCategoria,
											ativoProduto,
											idUsuario,
											qtdMinEstoque,
											imagem)
										VALUES
											(?,?,?,?,?,?,?,?)");

			if(odbc_execute($stmt, array(	$_POST['nomeProduto'],
											$_POST['descProduto'],
											$_POST['precProduto'],
											$_POST['descontoPromocao'],
											$_POST['idCategoria'],
											$_POST['ativoProduto'],
											$_POST['idUsuario'],
											$_POST['qtdMinEstoque'],
											$_FILES['imagem'],))){
				$msg = 'Produto gravado com sucesso!';			
			} else{
				$erro = 'Erro ao gravar o produto.';
			}								
							
		} else{
		
			$erro = 'Os campos: Nome, preço, desconto, id categoria e quantidade mínima estoque são obrigatório.';
		
		}
	}
//FIM Funcionalidade Gravar Cadastro

//Funcionalidade Listar
$q = odbc_exec($db, 'SELECT idProduto, nomeProduto,	descProduto, precProduto, descontoPromocao,	idCategoria, ativoProduto, idUsuario, qtdMinEstoque, imagem
					 FROM Produto ');

while($r = odbc_fetch_array($q)){
	
	$produtos[$r['idProduto']] = $r;
	
}
//FIM Funcionalidade Listar

if(isset($_GET['cadastrar'])){//FORM Cadastrar

	include('template_cadastrar.php');
	
}elseif(isset($_GET['editar'])){//FORM Editar

	if(is_numeric($_GET['editar'])){
		$q = odbc_exec($db, "	SELECT 	idProduto, nomeProduto,	descProduto, precProduto, descontoPromocao,	idCategoria, ativoProduto, idUsuario, qtdMinEstoque, imagem
								FROM Produto 
								WHERE idProduto = {$_GET['editar']}");
		$dados_produtos = odbc_fetch_array($q);
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
									Produto 
								WHERE 
									idProduto = {$_GET['apagar']}")){	
				$apagar_msg = 'Registro apagado com sucesso!';						
			}else{
				$apagar_msg = 'Erro ao apagar o registro';
			}	
		}	
	}


?>