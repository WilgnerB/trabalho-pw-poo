<?php

	require_once 'class/PassagemDAO.php';

	$operacao = $_GET["operacao"];
	$passagemDAO = new PassagemDAO();
	$passagem = new Passagem();

	switch($operacao) 
	{
        case 'salvar':

			$passagem->setId($_POST['id']);
			$passagem->setOrigem($_POST['origem']);
			$passagem->setDestino($_POST['destino']);
			$passagem->setPoltrona($_POST['poltrona']);
			$passagem->setValor($_POST['valor']);
			$resultado = $passagemDAO->salvar($passagem);

			echo $resultado;

			if($resultado == TRUE){
				echo "<script>alert('Registro salvo com sucesso !!!'); location.href='PassagemTabela.php';</script>"; 
			}else{
				echo "<script>alert('Erro ao salvar o registro'); location.href='PassagemTabela.php';</script>"; 			
			}

        	break; 

        case 'excluir':
			
			$resultado = $passagemDAO->excluirPorId($_GET["id"]);

			if($resultado == 1){
				echo "<script>alert('Registro excluido com sucesso !!!'); location.href='PassagemTabela.php';</script>"; 
			}else{
				echo "<script>alert('Erro ao excluir o registro'); location.href='PassagemTabela.php';</script>"; 			
			}			
        	break;            	      	
         	
	}
			
?>