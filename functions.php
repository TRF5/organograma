<!-- <?php 

// define("LDAP_DOMINIO", "trf5.gov.br"); # domínio onde os usuários estão cadastrados (trf5.gov.br)
// define("LDAP_HOST", "192.168.9.11"); # o endereço do servidor LDAP (192.168.9.11)
// define("LDAP_USUARIOS_PERMITIDOS",  "rpereira;anaclaudia;e_rvcosta");  # lista de usuários que podem ser autenticados, separada por ponto e vírgula


// LDAP_DOMINIO = ; 
// LDAP_HOST = ; 
// LDAP_USUARIOS_PERMITIDOS = "rpereira;anaclaudia;e_rvcosta";
// $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

// $usuario = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);;
// $erro = "";


// autentica($usuario, $senha, $erro);

// function autentica($usu, $senha, &$erro) {
//     $usu = strtolower($usu);
    

//     $usuarios = explode(';', LDAP_USUARIOS_PERMITIDOS); 

//     if (!in_array($usu, $usuarios)) {
//         $erro = 'Usuário não autorizado';
//         return FALSE;
//     }

//     if (!$senha) {
//         $erro = 'Login ou senha incorretos';
//         return FALSE;
//     }

//     $conn = ldap_connect(LDAP_HOST);
//     if ($conn && $senha) {
//         echo "conectado.<br>";
//         ldap_set_option($conn, LDAP_OPT_PROTOCOL_VERSION, 3);
//         $bind = @ldap_bind($conn, $usu.'@'.LDAP_DOMINIO, $senha); 
//         echo "$bind";

//         ldap_close($conn);
//         if ($bind) {
//             echo "conectado user.<br>";
// 		    # Salva usuário na sessão
            
//             // session_start();
//             $_SESSION['login'] = $usu;
//             header('Location: bem-vindo.php');
        
//             return TRUE;
           
            

//         } else {
//             error_log('erro durante autenticação LDAP: usuário '.$usu.', ');
//             $erro  = 'Login ou senha incorretos';
//             return FALSE;
//         }
//     } else {
//         error_log('erro ao conectar ao servidor LDAP '.LDAP_HOST.', '); #._FILE_
//         $erro = 'Erro durante conexão com servidor LDAP';
//         return FALSE;
//     }
// }













// ?>

 -->
