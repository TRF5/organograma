



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organograma - Cargos</title>
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
                            <li class="item-breadcrumb">Cargos </li> 
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
        require_once("./conf.php");

        include "./db/cargo.class.php";
        include "./db/cargo-teste.class.php";

        $cargo = isset($_POST['nome-cargo']) ? $_POST['nome-cargo']: null; 
        $erros = array();
        $id = isset($_GET['id']) ? $_GET['id']: null; 

        if ($cargo) {
            
            
            
            if (insereCargo($cargo) ==  TRUE) {
                
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                         Cadastramento feito com sucesso!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>';
                
            } else {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Cargo j?? existe. Favor, tentar outro!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }
        }
        if ($id) {
            echo $id;
            
            
            if (deletarCargo($id) ==  TRUE) {
                
                
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                         Cargo deletado com sucesso!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>';
                
            } else {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        N??o foi poss??vel deletar este cargo. Favor, tentar novamente!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>';
            }
        }

    ?>
        
        <h3 class="titulo-principal">Cargos - Gerenciamento</h3>
        <form class="formulario" method="POST">
            <div class="mb-3">
                <label for="cargo" class="form-label cargo">Nome do cargo</label>
                <input type="text" class="form-control campo" id="cargo" name="nome-cargo"placeholder="Ex.: Presidente">
            </div>
            <div class="parte-inferior-formulario">
                <button type="submit" title="Adicionar novo cargo" class="btn botao btn-primary">Enviar</button>
                <button type="button" id="limpar" class="btn botao btn-outline-primary"
                    title="Limpar nome do cargo">Limpar</button>
            </div>
            
        </form>
        <div class="titulo-botao">
            <h3 class="titulo-principal">Cargos - Lista</h3>
            <button type="button" class="btn botao botao-listar btn-outline-success mb-3">Listar Cargos</button>
        </div>
     
        <table class="table" method="GET">
            <thead>
                <tr class="cabecalho-tabela">
                    <th scope="col">#</th>
                    <th class="ordenar" scope="col">Cargo
                        <div>
                            <i value="asc" onClick=<?php $consulta = Cargos::selectCargos('asc'); ?> id="asc" class="icone-ordenar fa-sharp fa-solid fa-circle-arrow-up"></i>
                            <i value="desc" onClick=<?php $consulta = Cargos::selectCargos('desc'); ?> id="desc" class="icone-ordenar fa-sharp fa-solid fa-circle-arrow-down"></i>
                        </div>
                    </th>
  
                    <th scope="col">A????es</th>
                </tr>
            </thead>
            <!-- DADOS QUE VAO VIR DO BANCO -->
            <tbody>
                <?php 
                    // include "./db/cargo.class.php";
                    
                    // if(isset($_GET['asc'])){
                    //     echo 'crescente';
                       
                    $consulta = Cargos::selectCargos("");
                  
                
                    while ($row = mysqli_fetch_array( $consulta ))
                        
                            echo
                
                        '<tr>
                            <th scope="row">'.$row['id'].'</th>
                            <td>'.$row['cargo'].'</td>
                            <td>
                                <a  href="deletar.php?id-cargo='.$row['id'].'" title="Excluir cargo de '.$row['cargo'].'" class="excluir icone-tabela" >
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                                <a title="ALterar cargo de '.$row['cargo'].'" class="editar icone-tabela" href="alterar-cargo.php?id='.$row['id'].'">
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