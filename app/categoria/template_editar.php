<!DOCTYPE html>
<html>
<head>
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
	  <link rel="stylesheet" type="text/css" href="../css/estilo.css">
	<title></title>
</head>
<body>

	<?php include('../layout/cabecalhoVoltar.php') ?>

<section>
	<div class="main grey lighten-3 center-align">
		<form method="post">
		
			<label> Nome: </label> <input type="text" name="nomeCategoria" value="<?php echo $dados_categorias['nomeCategoria']; ?>"><br><br>
			<label> Descrição: </label> <input type="text" name="descCategoria" value="<?php echo $dados_categorias['descCategoria']; ?>" ><br><br>
			<input type="hidden" name="idCategoria" value="<?php echo $dados_categorias['idCategoria']; ?>">
			<input type="submit" value="Atualizar" name="btnAtualizar" class="waves-effect waves-light btn-large">
		
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