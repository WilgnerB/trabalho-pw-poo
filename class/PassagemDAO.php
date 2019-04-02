<?php	
	require_once 'Banco.php';
	require_once 'Passagem.php';

	class PassagemDAO
	{

		public function salvar($passagem){	
			$situacao = FALSE;
			try{
				
				if($passagem->getId()==0){

					$situacao = $this->incluir($passagem);

				}else{	
					$situacao = $this->atualizar($passagem);
				}

			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}			

			return $situacao;
		}

		public function incluir($passagem){	
			$situacao = FALSE;
			try{
				
				$pdo = Banco::conectar();	

				$sql = "INSERT INTO tbpassagem(origem, destino, poltrona, valor) VALUES (:origem,:destino,:poltrona,:valor);";

				$run = $pdo->prepare($sql);
				$run->bindParam(':origem', $passagem->getOrigem(), PDO::PARAM_STR); 
				$run->bindParam(':destino', $passagem->getDestino(), PDO::PARAM_STR); 
				$run->bindParam(':poltrona', $passagem->getPoltrona(), PDO::PARAM_STR);
				$run->bindParam(':valor', $passagem->getValor(), PDO::PARAM_STR);
	  			$run->execute(); 

				if($run->rowCount() > 0){
					$situacao = TRUE;
				}

				$passagem->setId($pdo->lastInsertId());
				
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}finally {
				Banco::desconectar();
			}		

			return $situacao;
		}

		public function atualizar($passagem){	
			$situacao = FALSE;
			try{
				
				$pdo = Banco::conectar();
					
				$sql = "UPDATE tbpassagem SET origem=:origem , destino=:destino , poltrona=:poltrona , valor=:valor WHERE id=:id";

				$run = $pdo->prepare($sql);
				$run->bindParam(':id', $passagem->getId(), PDO::PARAM_INT); 
				$run->bindParam(':origem', $passagem->getOrigem(), PDO::PARAM_STR); 
				$run->bindParam(':destino', $passagem->getDestino(), PDO::PARAM_STR); 
				$run->bindParam(':poltrona', $passagem->getPoltrona(), PDO::PARAM_STR);
				$run->bindParam(':valor', $passagem->getValor(), PDO::PARAM_STR);
	  			$run->execute(); 
				
				if($run->rowCount() > 0){
					$situacao = TRUE;
				}
				
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}finally {
				Banco::desconectar();
			}			

			return $situacao;
		}						

		public function excluir($passagem){

			$situacao = FALSE;
			try{
				
				$pdo = Banco::conectar();	
					
				$sql = "DELETE FROM tbPassagem WHERE id = :id";

				$run = $pdo->prepare($sql);
	  			$run->bindParam(':id', $passagem->getId(), PDO::PARAM_INT);			
				$run->execute(); 

				if($run->rowCount() > 0){
					$situacao = TRUE;
				}
				
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}finally {
				Banco::desconectar();
			}			

			return $situacao;

		}

		public function excluirPorId($codigo){

			$situacao = FALSE;
			try{
				
				$pdo = Banco::conectar();	
					
				$sql = "DELETE FROM tbPassagem WHERE id = :id";

				$run = $pdo->prepare($sql);
	  			$run->bindParam(':id', $codigo, PDO::PARAM_INT);			
				$run->execute(); 

				if($run->rowCount() > 0){
					$situacao = TRUE;
				}
				
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}finally {
				Banco::desconectar();
			}			

			return $situacao;

		}					

		public function listar(){

			$objetos = array();	

			try{
				
				$pdo = Banco::conectar();
					
				$sql = "SELECT * FROM tbPassagem";

				$run = $pdo->prepare($sql);			
				$run->execute(); 
				$resultado = $run->fetchAll();

				foreach ($resultado as $objeto){

					$passagem = new Passagem();
					$passagem->setId($objeto['id']);
					$passagem->setOrigem($objeto['origem']);
					$passagem->setDestino($objeto['destino']);
					$passagem->setPoltrona($objeto['poltrona']);
					$passagem->setValor($objeto['valor']);
					array_push($objetos, $passagem);
				}	
				
			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}finally {
				Banco::desconectar();
			}		

			return $objetos;

		}			
		
		public function buscarPorId($codigo){

			$passagem = new Passagem();
						
			try{

				$pdo = Banco::conectar();

				$sql = "SELECT * FROM tbPassagem WHERE id = :id";

				$run = $pdo->prepare($sql);
	  			$run->bindParam(':id', $codigo, PDO::PARAM_INT);			
				$run->execute(); 
				$resultado = $run->fetch();

				$passagem = new Passagem();
				$passagem->setId($resultado['id']);
				$passagem->setOrigem($resultado['origem']);
				$passagem->setDestino($resultado['destino']);
				$passagem->setPoltrona($resultado['poltrona']);
				$passagem->setValor($resultado['valor']);

			}catch(Exception $ex){
				echo $ex->getFile().' : '.$ex->getLine().' : '.$ex->getMessage();
			}finally {
				Banco::desconectar();
			}
			
			return $passagem;
		}		
	}
?> 