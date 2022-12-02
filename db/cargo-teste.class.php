<?php
require_once("conf.php");
include 'bd.class.php';


class Cargos {

    // public $conn; 
    // $conn = 
    public function insereCargo($nome_cargo){
        // global $conn;  
        // $conn = mysqli_connect(Configuracao::db_host , Configuracao::db_usuario , Configuracao::db_senha , Configuracao::db_banco ) or die (Configuracao::db_mensagem_indisponibilidade."". $conn -> error ) ;      
        $check_email = mysqli_query(BancoConexao::connect(), "SELECT cargo FROM tipo_cargo where cargo = '".$nome_cargo."' ");
        $sql = "INSERT INTO tipo_cargo (cargo) VALUES ('".$nome_cargo."')";
        
        mysqli_set_charset(BancoConexao::connect(), "utf8");
        
        if(mysqli_num_rows($check_email) == 0){
            mysqli_query(BancoConexao::connect(), $sql);
            return TRUE;
        }
        else if (mysqli_num_rows($check_email) > 0){
            
            return FALSE;
            
        };
        BancoConexao::close();
    
    }

    public function selectCargos($ordem){
        # Executa a query desejada 
        
       
        mysqli_set_charset(BancoConexao::connect(), "utf8");
        #colocar var pra nome da tabela
        $result_query;
        if($ordem == ""){
           $result_query = mysqli_query(BancoConexao::connect(), 'SELECT * FROM tipo_cargo' ) or die(' Erro na query:' . $query . ' ' .mysql_error() );
        }
        else if($ordem == "asc"){
            $result_query = mysqli_query(BancoConexao::connect(), 'SELECT * FROM tipo_cargo ORDER BY cargo ASC' ) or die(' Erro na query:' . $query . ' ' .mysql_error() );
        }
        else if($ordem == "desc"){
            $result_query = mysqli_query(BancoConexao::connect(), 'SELECT * FROM tipo_cargo ORDER BY cargo DESC' ) or die(' Erro na query:' . $query . ' ' .mysql_error() );
        }
        
        return $result_query;
     
        BancoConexao::close();

    
    }

	
}
?>