<!DOCTYPE html>
<html>
<head>
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
	  <link rel="stylesheet" type="text/css" href="../css/estilo.css">
	<title></title>
</head>
<body>

	<?php include('../layout/cabecalhoVoltar.php'); 
		  include('../db/bancodedados.php');
		  session_start()
		  
		  ?>
<section>
	<div class="main grey lighten-3 center-align">
	<form method="POST" enctype="multipart/form-data" class="formProduto">
		<fieldset>
		<legend><b>EDIÇÃO PRODUTO</b></legend>
		<label>Nome:</label> <input type="text" name="nomeProduto" value=" <?php echo $dados_produtos['nomeProduto']; ?>"> <br>

		<label>Descrição:</label> <input type="text" name="descProduto" value=" <?php echo $dados_produtos['descProduto']; ?>"> <br>

		<label>Preço:</label> <input type="number" name="precProduto" value="<?php echo $dados_produtos['precProduto']; ?>"> <br>

		<label>Desconto:</label> <input type="number" name="descontoPromocao" value="<?php echo $dados_produtos['descontoPromocao']; ?>"> <br>

		<label>Categoria:</label> 
		<select name="idCategoria">
			<option value="">Escolha</option>
			<?php

				$c = odbc_exec($db, 'SELECT idCategoria, nomeCategoria
						 FROM Categoria');

				while($cat = odbc_fetch_array($c)){
		
				$categorias[$cat['idCategoria']] = $cat;
				}

				foreach ($categorias as $idCategoria => $dadosCategoria) {
					$utf_nomeCategoria = $dadosCategoria['nomeCategoria'];
					$utf_nomeCategoria = utf8_encode($utf_nomeCategoria);
					echo "
					<option value='$idCategoria'>$utf_nomeCategoria</option> 
					";
				}
			?>

		</select><br>

		<input type="checkbox" id="ativo1" name="ativoProduto"> 
		<label for="ativo1">Status Ativo</label> <br> <br>

		<input type="hidden" name="<?php $_SESSION['idUsuario']?>"> 

		<label>Qtd Min. no Estoque:</label> <input type="number" name="qtdMinEstoque"> <br>

	    <div class="file-field input-field">
	      <div class="btn light-blue darken-1">
	        <span>Imagem</span>
	        <input type="file" name="imagem">
	      </div>
	      <div class="file-path-wrapper">
	        <input class="file-path validate" type="text">
	      </div>
	    </div>
		<br>
<!--PENDENTE arrumar Categoria e inserir campo para imagem-->

		<input type="submit" value="Gravar" name="btnGravar" class="waves-effect waves-light btn-large">
		</fieldset>
	</form>
	</div>
</section>

	<?php  
		require('../layout/rodape.php');
	?>
     
      <script>
       	  $(document).ready(function() {
    	  $('select').material_select();
          });
      </script>				
	</body>
</html>