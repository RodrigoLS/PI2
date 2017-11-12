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
		  $id_user = $_SESSION["idUsuario"];
	?>

<section>
	<div class="main grey lighten-3 center-align">
	<form method="POST" enctype="multipart/form-data" class="formProduto">
		<fieldset>
		<legend><b>NOVO PRODUTO</b></legend>

		<div class="input-field">
		<input id="in-nome" type="text" name="nomeProduto" class="validate"><label for="in-nome">Nome:</label>
		</div>

		<div class="input-field">
		<input id="in-desc" type="text" name="descProduto"><label for="in-desc">Descrição:</label>
		</div>

		<div class="input-field">
		<input id="in-preco" type="number" name="precProduto" class="validate"><label for="in-preco">Preço(R$):</label>
		</div>

		<div class="input-field">
		<input id="in-descon" type="number" name="descontoPromocao"><label for="in-descon">Desconto(%):</label> 
		</div>

		<label>Categoria:</label> 
		<select name="idCategoria">
			<option value="">Escolha</option>
			<?php

				$c = odbc_exec($db, 'SELECT idCategoria, nomeCategoria
						 FROM Categoria');

				while($cat = odbc_fetch_array($c)){
					$cat['nomeCategoria'] = utf8_encode($cat['nomeCategoria']);
		
				$categorias[$cat['idCategoria']] = $cat;
				}

				foreach ($categorias as $idCategoria => $dadosCategoria) {
					$utf_nomeCategoria = $dadosCategoria['nomeCategoria'];
					echo "
					<option value='$idCategoria'>$utf_nomeCategoria</option> 
					";
				}
			?>

		</select>

		<input type="hidden" name="idUsuario" value="<?php echo"$id_user"?>"> 

		<div class="input-field">
		<input id="in-estoque" type="number" name="qtdMinEstoque" class="validate"><label for="in-estoque">Qtd Min. no Estoque:</label>
		</div>

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
		<input type="checkbox" id="ativo1" name="ativoProduto"> 
		<label for="ativo1">Status Ativo</label> 
		<br><br>
		<input type="submit" value="Gravar" name="btnGravar" class="waves-effect waves-light btn-large">
		</fieldset>
	</form>
	</div>
</section>
	<?php  
		require('../layout/rodape.php');
	?>

      <script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
      <script>
       	  $(document).ready(function() {
    	  $('select').material_select();
          });
      </script>
</body>
</html>