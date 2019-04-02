<?php	
	session_start();
	require_once 'class/PassagemDAO.php';
?>

<html>
    <head>
		<meta charset="utf-8">
		<title>Usuário</title>
		<link type="text/css" rel="stylesheet" href="css/bootstrap.css"/>
		<link type="text/css" rel="stylesheet" href="css/passagem.css"/>
		
    </head>

    <body>	
		
		<div class="cabecalho">	
			<?php 
				$menu = "passagem";
				include_once("Cabecalho.php");  	
			?>
		</div>		
				
		<div class="container">				
			<table id="tabelaPassagem" class="table table-striped">
				<thead>			
					<tr>
						<th class="col-md-3">Origem</th>
						<th class="col-md-3">Destino</th>
						<th class="col-md-2">Poltrona</th>
						<th class="col-md-2">Valor</th>
						<th class="col-md-1"></th>
						<th class="col-md-1"><a class="btn btn-primary" href="PassagemFormulario.php">Novo</a></th>
					</tr>
				</thead>
				<tbody>
					<?php

						$passagemDAO = new PassagemDAO();
						$lista = $passagemDAO->listar();

						foreach($lista as $passagem){
		
							echo"<tr>";			
							echo"<td>{$passagem->getOrigem()}</td>";
							echo"<td>{$passagem->getDestino()}</td>";
							echo"<td>{$passagem->getPoltrona()}</td>";
							echo"<td>{$passagem->getValor()}</td>";

							echo"<td> <a class='btn btn-success' href='PassagemFormulario.php?id={$passagem->getId()}'> editar </a> </td>";
							echo"<td> <a class='btn btn-danger'  href='PassagemControlador.php?operacao=excluir&id={$passagem->getId()}'> excluir </a> </td>";								
							echo"</tr>";					
						}
						
					?>		
						
				</tbody>
			</table>	
		<div>				
		
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
		<script type="text/javascript" src="js/passagem.js"></script>
		
    </body>
</html>