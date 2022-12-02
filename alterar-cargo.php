
<?php 

require_once("conf.php");
require_once('./db/bd.class.php');
#ALTERAR CARGO
$conn = mysqli_connect(Configuracao::db_host , Configuracao::db_usuario , Configuracao::db_senha , Configuracao::db_banco ) or die (Configuracao::db_mensagem_indisponibilidade."". $conn -> error ) ;    
mysqli_set_charset($conn, "utf8");

$id = isset($_GET['id']) ? $_GET['id'] : '';
// $conn = mysqli_connect(Configuracao::db_host , Configuracao::db_usuario , Configuracao::db_senha , Configuracao::db_banco ) or die (Configuracao::db_mensagem_indisponibilidade."". $conn -> error ) ;
//dados que vem do banco

$select = mysqli_query($conn, "SELECT cargo FROM tipo_cargo WHERE id=$id");
$row = mysqli_fetch_assoc($select);
$cargo = $row['cargo'];


$nome_cargo = isset($_POST['nome-cargo']) ? $_POST['nome-cargo'] : '';

// FUNÇAO A SER CHAMADA SO QUANDO CLICAR EM ENVIAR
// IF EDITAR = TRUE
function alterarCargo($cargo_novo){
    global $conn;
    global $id;
    $check_nome = mysqli_query($conn, "SELECT cargo FROM tipo_cargo where cargo = '".$cargo_novo."' ");
    $sql = "UPDATE tipo_cargo SET cargo='".$cargo_novo."' WHERE id=$id";


    
    
    mysqli_set_charset($conn, "utf8");
    if(mysqli_num_rows($check_nome) == 0){
        mysqli_query($conn, $sql);
        return TRUE;
    }
    // else if ($cargo_novo === '' || $cargo_novo === NULL){
    //     return FALSE;
    // }
    else if (mysqli_num_rows($check_nome) > 0){
        
        return FALSE;
        
    };
    mysqli_close($conn);
}
// if(isset($_POST['nome-cargo'])){
//     // alterarCargo($nome_cargo);
    
    
// }
require_once("alterar-cargo.html.php"); 



    


?>

