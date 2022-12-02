<?php 

require_once("./conf.php");
require_once('./db/bd.class.php');

$conn = BancoConexao::connect();
$id_cargo = isset($_GET['id-cargo']) ? $_GET['id-cargo'] : '';
$id_instituicao = isset($_GET['id-instituicao']) ? $_GET['id-instituicao'] : '';

function deletarCargo($id_cargo){
   
    $sql = "DELETE FROM tipo_cargo WHERE id=$id_cargo";
    global $conn;  
    mysqli_set_charset($conn, "utf8");
    if (mysqli_query($conn, $sql)) {
        
        header('Location: /organograma-atualizado/cargos.php');
        return TRUE;
        exit;
    } else {
        return FALSE;
        echo 'erro';
    }
};
function deletarInstituicao($id_instituicao){
    $sql = "DELETE FROM instituicao WHERE id=$id_instituicao";
    global $conn;  
    mysqli_set_charset($conn, "utf8");
    if (mysqli_query($conn, $sql)) {
        
        header('Location: /organograma-atualizado/instituicao.php');
        return TRUE;
        exit;
    } else {
        return FALSE;
        echo 'erro';
    }
}


if($id_cargo){
    deletarCargo($id_cargo);
}
else if($id_instituicao){
    deletarInstituicao($id_instituicao);
}
?>
