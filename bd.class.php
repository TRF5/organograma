<?php

função OpenCon ( ) {

    $conn = new mysqli (Configuracao::db_host , Configuracao::db_usuario , Configuracao::db_senha , Configuracao::db_banco ) ou die (Configuracao::db_mensagem_indisponibilidade."". $conn - > error ) ;      
    
    return $con ; 
}
 
função CloseCon ( $conn ){
    $conn - > fechar ( ) ;  
}

// class ConexaoBanco {
// 	public $conn;
	
// 	public function __construct() {
// 		$this->conn = @pg_connect("host="" port=".Configuracao::db_porta." dbname=".Configuracao::db_banco." user=".Configuracao::db_usuario." password=".Configuracao::db_senha) 
// 			or die(Configuracao::db_mensagem_indisponibilidade);
// 	}
	
// 	public function prepare($nome, $sql) {
// 		pg_prepare($this->conn, $nome, $sql);
// 	}
	
// 	public function execute($nome, $params) {
// 		return pg_execute($this->conn, $nome, $params);
// 	}
	
// 	public function fetch($stmt) {
// 		return pg_fetch_array($stmt);
// 	}
	
// 	public function close(){
// 		pg_close($this->conn);
// 	}
	
} 