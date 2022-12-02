



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organograma - Instituição</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./bootstrap-5.2.1-dist/css/bootstrap.min.css">
    <link href="./fontawesome-free-6.2.0-web/css/all.min.css" rel="stylesheet">
    
</head>

<body>
    <header id="fixado" class="header-interno">
            <div class="parte-superior-cabecalho text-right acessibilidade">
            </div>
            <div class="logo">
                <div>
                    <h1>Sistema Organograma</h1>
                    <nav class="breadcrumb" aria-label="breadcrumb">
                        <ol class="breadcrumb-pagina">
                            <li class="item-breadcrumb">Instituição </li> 
                            <li class="active">> Gerenciamento</li>
                        </ol>
                    </nav> 
                </div>
                
                <?php require_once("./template-parts/searchform.php"); ?>   
            </div>
           
    </header>
    <?php require_once("./template-parts/sidebar.php"); ?>
    <main id="Inicio_Conteudo" class="container">
        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
            <symbol id="check-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
            </symbol>
            <symbol id="info-fill" viewBox="0 0 16 16">
                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
            </symbol>
            <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
            </symbol>
        </svg>
        <?php
        require_once("conf.php");

        include "./db/instituicao.class.php";
        // include "../db/cargo-teste.class.php";
        // colocar no arquivo php sozinho 
        $instituicao = isset($_POST['instituicao']) ? $_POST['instituicao']: null; 
        $sigla = isset($_POST['sigla']) ? $_POST['sigla']: null; 
        $erros = array();
        $id = isset($_GET['id']) ? $_GET['id']: null; 

        if ($instituicao) {
            
            
            
            if (Instituicao::insereInstituicao($instituicao, $sigla) ==  TRUE) {
                
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                         Cadastramento feito com sucesso!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>';
                
            } else {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Instituição já existe. Favor, tentar outra!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }
        }
        if ($id) {
            echo $id;
            
            
            if (deletarCargo($id) ==  TRUE) {
                
                
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                         Instituição deletada com sucesso!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>';
                
            } else {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Não foi possível deletar este Instituição. Favor, tentar novamente!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }
        }

    ?>
        
        <h3 class="titulo-principal">Instituição - Gerenciamento</h3>
        <form class="formulario" method="POST">
            <div class="mb-3">
                <label for="instituicao" class="form-label cargo ">Nome da Instituição</label>
                <input type="text" class="form-control campo" id="instituicao" name="instituicao"placeholder="Ex.: Tribunal Regional Federal da 5ª Região">
            </div>
            <div class="mb-3">
                <label for="sigla" class="form-label cargo ">Sigla</label>
                <input type="text" class="form-control campo" id="sigla" name="sigla"placeholder="Ex.: TRF5">
            </div>
            <div class="parte-inferior-formulario">
                <button type="submit" title="Adicionar nova instituição" class="btn botao btn-primary">Enviar</button>
                <button type="button" id="limpar" class="btn botao btn-outline-primary"
                    title="Limpar nome do ">Limpar</button>
            </div>
            
        </form>
        <div class="titulo-botao">
            <h3 class="titulo-principal">Instituição - Lista</h3>
            <button type="button" class="btn botao botao-listar btn-outline-success mb-3">Listar Instituições</button>
        </div>
     
        <table class="table" method="GET">
            <thead>
                <tr class="cabecalho-tabela">
                    <th scope="col">#</th>
                    <th class="ordenar" scope="col">Instituição
                        <div>
                            <i value="asc" onClick=<?php $consulta = Instituicao::selectInstituicao('asc'); ?> id="asc" class="icone-ordenar fa-sharp fa-solid fa-circle-arrow-up"></i>
                            <i value="desc" onClick=<?php $consulta = Instituicao::selectInstituicao('desc'); ?> id="desc" class="icone-ordenar fa-sharp fa-solid fa-circle-arrow-down"></i>
                        </div>
                    </th>
                    <th scope="col">Sigla</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <!-- DADOS QUE VAO VIR DO BANCO -->
            <tbody>
                <?php 
                    // include "./db/cargo.class.php";
                    
                    // if(isset($_GET['asc'])){
                    //     echo 'crescente';
                       
                    $consulta = Instituicao::selectInstituicao("");
                  
                
                    while ($row = mysqli_fetch_array( $consulta ))
                        
                            echo
                
                        '<tr>
                            <th scope="row">'.$row['id'].'</th>
                            <td>'.$row['instituicao'].'</td>
                            <td>'.$row['sigla'].'</td>
                            <td>
                                <a  href="deletar.php?id-instituicao='.$row['id'].'" title="Excluir instituição: '.$row['instituicao'].'" class="excluir icone-tabela" >
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                                <a title="Alterar nome da instituição '.$row['instituicao'].'" class="editar icone-tabela" href="alterar-instituicao.php?id='.$row['id'].'">
                                    <i class="fa-solid fa-pencil"></i
                                ></a>
                            </td>
                    
                        </tr>'
                ?>
               
               
            </tbody>
        </table>
         <div class="alinhado-direita">
                <button type="button" id="exibir" class="btn botao btn-outline-primary"
                    title="Exibir mais cargos">Ver mais</button>
        </div>
        
       
    </main>
    <?php require_once("footer.html.php"); ?>

</body>

</html>