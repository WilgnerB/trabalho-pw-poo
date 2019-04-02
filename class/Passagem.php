<?php
	class Passagem
	{
		private  $id;
        private  $origem;
        private  $destino;
        private  $poltrona;
        private  $valor;
                
        function __construct() {
            $this->setId(0);
            $this->setOrigem("");
            $this->setDestino("");
            $this->setPoltrona(0);
            $this->setValor(0.0);
        }


        		
        function getId() {
            return $this->id;
        }

        function getOrigem() {
            return $this->origem;
        }

        function getDestino() {
            return $this->destino;
        }

        function getPoltrona() {
            return $this->poltrona;
        }

        function getValor() {
            return $this->valor;
        }

        function setId($id) {
            $this->id = intval($id);
        }

        function setOrigem($origem) {
            $this->origem = $origem;
        }

        function setDestino($destino) {
            $this->destino = $destino;
        }

        function setPoltrona($poltrona) {
            $this->poltrona = $poltrona;
        }

        function setValor($valor) {
            $this->valor = doubleval($valor);
        }
	}
?>