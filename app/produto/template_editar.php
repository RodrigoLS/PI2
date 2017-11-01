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
		  session_start();
		  $id_user = $_SESSION["idUsuario"];
		  
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
			<?php

				$c = odbc_exec($db, 'SELECT idCategoria, nomeCategoria
						 FROM Categoria');

				while($cat = odbc_fetch_array($c)){
				$cat['nomeCategoria'] = utf8_encode($cat['nomeCategoria']);
				$categorias[$cat['idCategoria']] = $cat;
				}

				foreach ($categorias as $idCategoria => $dadosCategoria) {
					$utf_nomeCategoria = $dadosCategoria['nomeCategoria'];
						if ($idCategoria == $dados_produtos['idCategoria']) {
							echo "<option value='$idCategoria' selected> $utf_nomeCategoria </option>";	
						}
						else {
							echo "<option value='$idCategoria'>$utf_nomeCategoria</option> ";
						}
				}
			?>

		</select><br>

		<input type="checkbox" id="ativo1" name="ativoProduto" 
			<?php if($dados_produtos['ativoProduto'] == 1) echo "checked"; ?>>
		<label for="ativo1">Status Ativo</label> <br> <br>

		<input type="hidden" name="idUsuario" value="<?php echo"$id_user"?>"> 

		<label>Qtd Min. no Estoque:</label> <input type="number" name="qtdMinEstoque" value="<?php echo $dados_produtos['qtdMinEstoque'];?>"> <br>

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

		<input type="hidden" name="idProduto" value="<?php echo $_GET['editar']; ?>">
		<input type="submit" value="Atualizar" name="btnAtualizar" class="waves-effect waves-light btn-large">
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