<?php
	ini_set('odbc.defaultlrl', 90000000);

	include('../db/bancodedados.php');
	include('../auth/controle.php');

	//Funcionalidade Gravar Cadastro
	if(isset($_POST['btnGravar'])){
		unset($_GET['cadastrar']);
		if(	!empty($_POST['nomeProduto']) && !empty($_POST['precProduto']) && !empty($_POST['idCategoria']) && !empty($_POST['qtdMinEstoque'])){

			$_POST['nomeProduto'] = utf8_decode($_POST['nomeProduto']);
			$_POST['descProduto'] = utf8_decode($_POST['descProduto']);
			$_POST['ativoProduto'] = (int) $_POST['ativoProduto']; 
			$_POST['idUsuario'] = intval($_POST['idUsuario']);
			
			//SÓ ACEITAR IMAGEM EM JPEG OU PNG
			if (isset($_FILES['imagem'])) {
			
				if (($_FILES['imagem']['type'] == "image/jpeg" OR $_FILES['imagem']['type'] == "image/png") && ($_FILES['imagem']['size'] <= 1000000)) {
			
					$arquivo = $_FILES['imagem']['tmp_name'];
					$imagem = fopen($arquivo, "r");
					$conteudo = fread($imagem, filesize($arquivo));
				}
			}

			
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
											(?,?,?,?,?,?,?,?,?)");

			if(odbc_execute($stmt, array(	$_POST['nomeProduto'],
											$_POST['descProduto'],
											$_POST['precProduto'],
											$_POST['descontoPromocao'],
											$_POST['idCategoria'],
											$_POST['ativoProduto'],
											$_POST['idUsuario'],
											$_POST['qtdMinEstoque'],
											$conteudo))){
				$msg = 'Produto gravado com sucesso!';			
			} else{
				$erro = 'Erro ao gravar o produto.';
			}								
							
		} else{
		
			$erro = 'Os campos: Nome do produto, preço, id categoria e quantidade mínima estoque são obrigatório.';
		
		}
	}
//FIM Funcionalidade Gravar Cadastro
//Funcionalidade Editar Cadastro

if(isset($_POST['btnAtualizar'])){
		unset($_GET['editar']);
		if(	!empty($_POST['nomeProduto']) && !empty($_POST['precProduto']) && !empty($_POST['idCategoria']) && !empty($_POST['qtdMinEstoque'])){
						
			$_POST['ativoProduto'] = 
			isset($_POST['ativoProduto']) ? 1 : 0;
		
			$_POST['nomeProduto'] = utf8_decode($_POST['nomeProduto']);
			$_POST['descProduto'] = utf8_decode($_POST['descProduto']);
			$_POST['ativoProduto'] = (int) $_POST['ativoProduto'];	
			$_POST['idUsuario'] = intval($_POST['idUsuario']);				
			
			//SÓ ACEITAR IMAGEM EM JPEG OU PNG
			if (isset($_FILES['imagem'])) {
			
				if (($_FILES['imagem']['type'] == "image/jpeg" OR $_FILES['imagem']['type'] == "image/png") && ($_FILES['imagem']['size'] <= 1000000)) {
			
					$arquivo = $_FILES['imagem']['tmp_name'];
					$imagem = fopen($arquivo, "r");
					$conteudo = fread($imagem, filesize($arquivo));
				} 
			}

			
			// Se não for inserida nova imagem, manter a antiga:

			if(empty($conteudo)) {

				$stmt = odbc_prepare($db, "	UPDATE 
											Produto
										SET 
											nomeProduto = ?,
											descProduto = ?,
											precProduto = ?,
											descontoPromocao = ?,
											idCategoria = ?,
											ativoProduto = ?,
											idUsuario = ?, 
											qtdMinEstoque = ?
										WHERE
											idProduto = ?");
										
					if(odbc_execute($stmt, array(	$_POST['nomeProduto'],
													$_POST['descProduto'],
													$_POST['precProduto'],
													$_POST['descontoPromocao'],
													$_POST['idCategoria'],
													$_POST['ativoProduto'],
													$_POST['idUsuario'],
													$_POST['qtdMinEstoque'],
													$_POST['idProduto']))){
						$msg = 'Produto atualizado com sucesso!';			
					}else{
						$erro = 'Erro ao atualizar o produto';
					}
			} else {
				$stmt = odbc_prepare($db, "	UPDATE 
											Produto
										SET 
											nomeProduto = ?,
											descProduto = ?,
											precProduto = ?,
											descontoPromocao = ?,
											idCategoria = ?,
											ativoProduto = ?,
											idUsuario = ?, 
											qtdMinEstoque = ?,
											imagem = ?
										WHERE
											idProduto = ?");
										
					if(odbc_execute($stmt, array(	$_POST['nomeProduto'],
													$_POST['descProduto'],
													$_POST['precProduto'],
													$_POST['descontoPromocao'],
													$_POST['idCategoria'],
													$_POST['ativoProduto'],
													$_POST['idUsuario'],
													$_POST['qtdMinEstoque'],
													$conteudo,
													$_POST['idProduto']))) {
						$msg = 'Produto atualizado com sucesso!';			
					}else{
						$erro = 'Erro ao atualizar o produto';
					}
			}

		} else{
		
			$erro = 'Erro ao atualizar o produto';
		
		}
}


//FIM Funcionalidade Editar Cadastro

// consulta para apagar 
	if(isset($_GET['apagar'])){
		if(is_numeric($_GET['apagar'])){

		$v = odbc_exec($db,"SELECT  qtdProduto 
									FROM  ItemPedido 
									WHERE idProduto = {$_GET['apagar']}");

			if (odbc_num_rows($v) > 0 ) {
				$erro = 'Produto não pode ser apagado pois ele está presente em pedido(s) efetuado(s)!';
			}
			elseif(odbc_exec($db, "	DELETE 
								FROM 
									Produto 
								WHERE 
									idProduto = {$_GET['apagar']}")){	
				
				$msg = 'Registro apagado com sucesso!';
							
			}else{
				$erro = 'Erro ao apagar o registro';
			}	
		}	
	}


//Funcionalidade Listar

if (isset($_GET['consulta'])) {
	
	$pesquisar = $_GET['consulta'];

	$q = odbc_exec($db, "SELECT idProduto, nomeProduto,	descProduto, precProduto, descontoPromocao,	idCategoria, ativoProduto, idUsuario, qtdMinEstoque, imagem
					 	 FROM Produto
					 	 WHERE nomeProduto LIKE '%$pesquisar%' OR descProduto LIKE '%$pesquisar%' ");

	while($r = odbc_fetch_array($q)){
		$r['nomeProduto'] = utf8_encode($r['nomeProduto']);
		$r['descProduto'] = utf8_encode($r['descProduto']);
	
		$produtos[$r['idProduto']] = $r;
	}
		unset($_GET['consulta']);	
} else {
//Verificar se está sendo passado na URL a página atual, senao é atribuido a pagina 
		$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
//Definição da página anterior e posterior
		$pagina_anterior = $pagina - 1;
		$pagina_posterior = $pagina + 1;
//Seleciona todos os itens da tabela
		$q = odbc_exec($db, "SELECT * FROM Produto");

//Conta o total de entradas da tabela
		$total_produto = odbc_num_rows($q);
//Seta a quantidade de entradas por aba
		$quantidade_pg = 5;
//Calcula o número de abas necessárias
		$num_aba = ceil($total_produto/$quantidade_pg);
//Calcula o inicio da vizualização
		$inicio = (($quantidade_pg*$pagina) - $quantidade_pg);
//Selecionar as linhas a serem apresentadas na aba
	$result_produto = "SELECT idProduto, nomeProduto,	descProduto, precProduto, descontoPromocao,	idCategoria, ativoProduto, idUsuario, qtdMinEstoque, imagem FROM Produto ORDER BY idProduto OFFSET $inicio ROWS FETCH NEXT $quantidade_pg ROWS ONLY" ;
	$resultado_produto = odbc_exec($db,$result_produto);

	while($r = odbc_fetch_array($resultado_produto)){
		$r['nomeProduto'] = utf8_encode($r['nomeProduto']);
		$r['descProduto'] = utf8_encode($r['descProduto']);
	
		$produtos[$r['idProduto']] = $r;

	}
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
		$dados_produtos['nomeProduto'] = utf8_encode($dados_produtos['nomeProduto']);
		$dados_produtos['descProduto'] = utf8_encode($dados_produtos['descProduto']);
		$dados_produtos['precProduto'] = number_format($dados_produtos['precProduto'],2);
		$dados_produtos['descontoPromocao'] = number_format($dados_produtos['descontoPromocao'],0);

	}else{
		$erro = 'Código inválido';
	}

	include('template_editar.php');
	
}else{//FORM Listar

	include('template.php');
	
}



?>
