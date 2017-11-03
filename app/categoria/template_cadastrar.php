<!DOCTYPE html>
<html>
<head>
	  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
	  <link rel="stylesheet" type="text/css" href="../css/estilo.css">
	<title></title>
</head>
<body>

	<?php include('../layout/cabecalhoVoltar.php') ?>

<section>
	<div class="main grey lighten-3 center-align">
	<form method="POST">
		<fieldset>
		<legend><b>NOVA CATEGORIA</b></legend>

		<div class="input-field">	
			<input id="nome-categoria" type="text" name="nomeCategoria" class="validade">
			<label for="nome-categoria"> Nome: </label>
			<br>
		</div>

        <div class="input-field">
          <textarea id="textarea1" class="materialize-textarea" name="descCategoria"></textarea>
          <label for="textarea1">Descrição:</label>
        </div>

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