<?php
	include('../db/bancodedados.php');
	include('../auth/controle.php');

	//Funcionalidade Gravar Cadastro
	if(isset($_POST['btnGravar'])){
		unset($_GET['cadastrar']);
		if(	!empty($_POST['nomeCategoria']) ){	
			$nomeCategoria_ISO = $_POST['nomeCategoria'];
			$descCategoria_ISO = $_POST['descCategoria'];

			$nomeCategoria_ISO = utf8_decode($nomeCategoria_ISO);
			$descCategoria_ISO = utf8_decode($descCategoria_ISO);

			$stmt = odbc_prepare($db, "	INSERT INTO Categoria
											(nomeCategoria,
											descCategoria)
										VALUES
											(?,?)");

			if(odbc_execute($stmt, array(	$nomeCategoria_ISO,
											$descCategoria_ISO,))){
				$msg = 'Categoria gravada com sucesso!';			
			} else{
				$erro = 'Erro ao gravar a categoria.';
			}								
							
		} else{
		
			$erro = 'O campo: Nome é obrigatório.';
		
		}
	}
//FIM Funcionalidade Gravar Cadastro
//Funcionalidade Editar
if(isset($_POST['btnAtualizar'])){
		unset($_GET['editar']);
		if(	!empty($_POST['nomeCategoria']) ){
						
			$_POST['nomeCategoria'] = utf8_decode($_POST['nomeCategoria']);
			$_POST['descCategoria'] = utf8_decode($_POST['descCategoria']);

			$stmt = odbc_prepare($db, "	UPDATE 
											Categoria
										SET 
											nomeCategoria = ?,
											descCategoria = ?
										WHERE
											idCategoria = ?");
										
			if(odbc_execute($stmt, array(	$_POST['nomeCategoria'],
											$_POST['descCategoria'],
											$_POST['idCategoria']))){
				$msg = 'Categoria atualizada com sucesso!';			
			}else{
				$erro = 'Erro ao atualizar a categoria';
			}
} else{
		
			$erro = 'Erro ao atualizar a categoria';
		
		}
	}

//FIM Funcionalidade Editar Cadastro

// Consulta para apagar 
	if(isset($_GET['apagar'])){
		if(is_numeric($_GET['apagar'])){
			
			if(odbc_exec($db, "	DELETE 
								FROM 
									Categoria 
								WHERE 
									idCategoria = {$_GET['apagar']}")){	
				$msg = 'Registro apagado com sucesso!';		
				
			}else{
				$erro = 'Erro ao apagar o registro';
			}	
		}	
	}

//Funcionalidade Listar

	
if (isset($_GET['consulta'])) {
	$pesquisar = $_GET['consulta'];

	$q = odbc_exec($db, "SELECT idCategoria, nomeCategoria, descCategoria
					 	 FROM Categoria
					 	 WHERE nomeCategoria LIKE '%$pesquisar%' OR descCategoria LIKE '%$pesquisar%' ");

	while($r = odbc_fetch_array($q)){
	
		$categorias[$r['idCategoria']] = $r;
	}

	unset($_GET['consulta']);
} else {
//Verificar se está sendo passado na URL a página atual, senao é atribuido a pagina 
		$pagina = (isset($_GET['pagina']))? $_GET['pagina'] : 1;
//Definição da página anterior e posterior
		$pagina_anterior = $pagina - 1;
		$pagina_posterior = $pagina + 1;
//Seleciona todos os itens da tabela
		$q = odbc_exec($db, "SELECT * FROM Categoria");

//Conta o total de entradas da tabela
		$total_categoria = odbc_num_rows($q);
//Seta a quantidade de entradas por aba
		$quantidade_pg = 5;
//Calcula o número de abas necessárias
		$num_aba = ceil($total_categoria/$quantidade_pg);
//Calcula o inicio da vizualização
		$inicio = (($quantidade_pg*$pagina) - $quantidade_pg);
//Selecionar as linhas a serem apresentadas na aba
	$result_categoria = "SELECT idCategoria, nomeCategoria, descCategoria FROM Categoria ORDER BY idCategoria OFFSET $inicio ROWS FETCH NEXT $quantidade_pg ROWS ONLY" ;
	$resultado_categoria = odbc_exec($db,$result_categoria);

	while($r = odbc_fetch_array($resultado_categoria)){
	
		$categorias[$r['idCategoria']] = $r;
	}
}


//FIM Funcionalidade Listar

if(isset($_GET['cadastrar'])){//FORM Cadastrar

	include('template_cadastrar.php');
	
}elseif(isset($_GET['editar'])){//FORM Editar

	if(is_numeric($_GET['editar'])){
		$q = odbc_exec($db, "	SELECT 	idCategoria, nomeCategoria,
										descCategoria
								FROM Categoria 
								WHERE idCategoria = {$_GET['editar']}");
		$dados_categorias = odbc_fetch_array($q);
	}else{
		$erro = 'Código inválido';
	}

	include('template_editar.php');
	
}else{//FORM Listar

	include('template.php');
	
}

?>