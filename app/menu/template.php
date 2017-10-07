<html>
<head>
	<meta charset="utf-8">
	<title>ADO PHP</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">
</head>
<body>
	<?php  
		require('../layout/cabecalho.php');
	?>
		
		<section>
			 <?php  
			 	session_start();
			 	echo "<p> Olá, " . $_SESSION['nomeUsuario'] . ".</p>";
			 	echo "<p> O sistema ainda está em desenvolvimento. </p>";
			 	echo "<p> Desde já, pedimos desculpas pelo transtorno.</p>";
			 	echo "<p> Atenciosamente, equipe HIPPO. </p>";
			 ?>

			 <img src="../img/LogoHippo.jpg" alt="Logo Loja" width="200px" height="200px" id="LogoMenu">
		</section>

	<?php  
		require('../layout/rodape.php');
	?>
</body>
</html>		