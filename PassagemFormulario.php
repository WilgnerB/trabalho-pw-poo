<?php	

	session_start();

	require_once 'class/PassagemDAO.php';

	$passagem = new Passagem();	
	
	if(isset($_GET["id"])){
		
		$id = $_GET["id"];

		$passagemDAO = new passagemDAO();
		$passagem = $passagemDAO->buscarPorId($id);

	}
			
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
						

		<form id="formPassagem" action="PassagemControlador.php?operacao=salvar" method="post">
			<div class="container">
				<div class="row form-group">
					<div class="col-md-12">
						<label for="login">Origem</label>  
						<input type="hidden" name="id" id="id" value="<?php echo $passagem->getId() ?>" >
						<input class="form-control" name="origem" id="origem" type="text" value="<?php echo $passagem->getOrigem() ?>">
					</div>			
				</div>	
				<div class="row form-group">
					<div class="col-md-12">
						<label for="destino">Destino</label>
						<input class="form-control" id="destino" name="destino" type="text" value="<?php echo $passagem->getDestino() ?>">
					</div>			
				</div>
				<div class="row form-group">
					<div class="col-md-12">
						<label for="poltrona">Poltrona</label>
						<input class="form-control" id="poltrona" name="poltrona" type="text" value="<?php echo $passagem->getPoltrona() ?>">
					</div>			
				</div>	
				<div class="row form-group">
					<div class="col-md-12">
						<label for="valor">Valor</label>
						<input class="form-control" id="valor" name="valor" type="text" value="<?php echo $passagem->getValor() ?>">
					</div>			
				</div>	
				
				<div class="row form-group">
					<div class="col-md-11">
						<button class="btn btn-success" type="submit" name="action">Salvar</button>
						<button class="btn btn-danger" type="reset" name="action">Cancelar</button>						
					</div>											
					<div class="col-md-1">
						<a class="btn btn-primary" href="PassagemTabela.php">Voltar</a>
					</div>																									
				</div>					
			</div>
		</form >	
	
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/bootstrap.js"></script>
		<script type="text/javascript" src="js/jquery.validate.js"></script>
		<script type="text/javascript" src="js/passagem.js"></script>
    </body>
</html>