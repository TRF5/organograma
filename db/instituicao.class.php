<?php
require_once("conf.php");
    include 'bd.class.php';


class Instituicao {

    // public $conn; 
    // $conn = 
    public function insereInstituicao($nome_instituicao, $sigla){
        // global $conn;  
        // $conn = mysqli_connect(Configuracao::db_host , Configuracao::db_usuario , Configuracao::db_senha , Configuracao::db_banco ) or die (Configuracao::db_mensagem_indisponibilidade."". $conn -> error ) ;      
        $check_instituicao = mysqli_query(BancoConexao::connect(), "SELECT instituicao FROM instituicao where instituicao = '".$nome_instituicao."' ");
        $sql = "INSERT INTO instituicao (instituicao, sigla) VALUES ('".$nome_instituicao."', '".$sigla."')";
        
        mysqli_set_charset(BancoConexao::connect(), "utf8");
        
        if(mysqli_num_rows($check_instituicao) == 0){
            mysqli_query(BancoConexao::connect(), $sql);
            return TRUE;
        }
        else if (mysqli_num_rows($check_instituicao) > 0){
            
            return FALSE;
            
        };
        BancoConexao::close();
    
    }

    public function selectInstituicao($ordem){
        # Executa a query desejada 
        
       
        mysqli_set_charset(BancoConexao::connect(), "utf8");
        #colocar var pra nome da tabela
        $result_query;
        if($ordem == ""){
           $result_query = mysqli_query(BancoConexao::connect(), 'SELECT * FROM instituicao' ) or die(' Erro na query:' . $query . ' ' .mysql_error() );
        }
        else if($ordem == "asc"){
            $result_query = mysqli_query(BancoConexao::connect(), 'SELECT * FROM instituicao ORDER BY instituicao ASC' ) or die(' Erro na query:' . $query . ' ' .mysql_error() );
        }
        else if($ordem == "desc"){
            $result_query = mysqli_query(BancoConexao::connect(), 'SELECT * FROM instituicao ORDER BY instituicao DESC' ) or die(' Erro na query:' . $query . ' ' .mysql_error() );
        }
        
        return $result_query;
     
        BancoConexao::close();

    
    }

	
}
?>