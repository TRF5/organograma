<?php
require_once("conf.php");



class BancoConexao {
    public $conn;
	public function __construct() {
        $this->conn = mysqli_connect(Configuracao::db_host , Configuracao::db_usuario , Configuracao::db_senha , Configuracao::db_banco ) or die (Configuracao::db_mensagem_indisponibilidade."". $conn -> error ) ;      
    }
    public function connect(){
        $conn = mysqli_connect(Configuracao::db_host , Configuracao::db_usuario , Configuracao::db_senha , Configuracao::db_banco ) or die (Configuracao::db_mensagem_indisponibilidade."". $conn -> error );
        return $conn;
    }
    public function close(){
        mysqli_close($this->conn);
    }
	
}



