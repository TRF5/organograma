<?php


require_once("./conf.php");




// $conn = mysqli_connect(Configuracao::db_host , Configuracao::db_usuario , Configuracao::db_senha , Configuracao::db_banco ) or die (Configuracao::db_mensagem_indisponibilidade."". $conn -> error ) ;    


function insereCargo($nome_cargo){
        global $conn;  
        // $conn = mysqli_connect(Configuracao::db_host , Configuracao::db_usuario , Configuracao::db_senha , Configuracao::db_banco ) or die (Configuracao::db_mensagem_indisponibilidade."". $conn -> error ) ;      
        $check_email = mysqli_query($conn, "SELECT cargo FROM tipo_cargo where cargo = '".$nome_cargo."' ");
        $sql = "INSERT INTO tipo_cargo (cargo) VALUES ('".$nome_cargo."')";
        
        mysqli_set_charset($conn, "utf8");
        
        if(mysqli_num_rows($check_email) == 0){
            mysqli_query($conn, $sql);
            return TRUE;
        }
        else if (mysqli_num_rows($check_email) > 0){
            
            return FALSE;
            
        };
        BancoConexao::close();
    
    }

// $cargo = isset($_POST['nome-cargo']) ? $_POST['nome-cargo']: null; 



function selectCargos(){
    # Executa a query desejada 
    
    global $conn;
    mysqli_set_charset($conn, "utf8");
    #colocar var pra nome da tabela
    $result_query = mysqli_query($conn, 'SELECT * FROM tipo_cargo' ) or die(' Erro na query:' . $query . ' ' .mysql_error() );
    // if($ordem == ""){
    //    $result_query = 
    // }
    // if($ordem == "asc"){
    //     $result_query = mysqli_query($conn, 'SELECT * FROM tipo_cargo ORDER BY cargo ASC' ) or die(' Erro na query:' . $query . ' ' .mysql_error() );
    // }
    // if($ordem == "desc"){
    // $result_query = mysqli_query($conn, 'SELECT * FROM tipo_cargo ORDER BY cargo DESC' ) or die(' Erro na query:' . $query . ' ' .mysql_error() );
    // }
    
    return $result_query;
    BancoConexao::close();

    
}

?>