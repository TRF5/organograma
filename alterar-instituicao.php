<?php 

require_once("conf.php");
// require_once('./db/bd.class.php');
#ALTERAR Instituição



$id = isset($_GET['id']) ? $_GET['id'] : '';
$conn = mysqli_connect(Configuracao::db_host , Configuracao::db_usuario , Configuracao::db_senha , Configuracao::db_banco ) or die (Configuracao::db_mensagem_indisponibilidade."". $conn -> error ) ;
mysqli_set_charset($conn, "utf8");

//dados que vem do banco

$select = mysqli_query($conn, "SELECT * FROM instituicao WHERE id=$id");
$row = mysqli_fetch_assoc($select);
$instituicao = $row['instituicao'];
$sigla = $row['sigla'];


$nome_instituicao = isset($_POST['instituicao']) ? $_POST['instituicao'] : '';
$sigla_nova = isset($_POST['sigla']) ? $_POST['sigla'] : '';
// FUNÇAO A SER CHAMADA SO QUANDO CLICAR EM ENVIAR
// IF EDITAR = TRUE
function alterarInstituicao($instituicao_atualizada, $sigla_nova){
    global $conn;
    global $id;
    $check_nome = mysqli_query($conn, "SELECT instituicao FROM instituicao where instituicao = '".$instituicao_atualizada."' ");
    $sql = "UPDATE instituicao,  SET instituicao='".$instituicao_atualizada."', sigla='".$sigla_nova."' WHERE id=$id";


    
    
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
require_once("alterar-instituicao.html.php"); 



    


?>

