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
	<form method="POST">
		<label>Nome:</label> <input type="text" name="nomeCategoria"> <br>

		<label>Descrição:</label> <input type="text" name="descCategoria"> <br>

		<input type="submit" value="Gravar" name="btnGravar" class="waves-effect waves-light btn-large">

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