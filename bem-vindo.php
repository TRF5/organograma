<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organograma - Página Inicial</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./bootstrap-5.2.1-dist/css/bootstrap.min.css">
    <link href="./fontawesome-free-6.2.0-web/css/all.min.css" rel="stylesheet">
</head>

<body>
    <header>
            <div class="parte-superior-cabecalho text-right acessibilidade">
            </div>
            <div class="logo ">
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
        <h3 class="titulo-principal">Cargos - Gerenciamento</h3>
        <form class="formulario">
            <div class="mb-3">
                <label for="cargo" class="form-label cargo">Nome do cargo</label>
                <input type="text" class="form-control" id="cargo" placeholder="Ex.: Presidente">
            </div>
            <div class="parte-inferior-formulario">
                <button type="submit" title="Adicionar novo cargo" class="btn botao btn-primary">Enviar</button>
                <button type="button" id="botaoLimpar" class="btn botao btn-outline-primary"
                    title="Limpar nome do cargo">Limpar</button>
            </div>
            
        </form>
        <h3 class="titulo-principal">Cargos - Lista</h3>
        <table class="table">
            <thead>
                <tr class="cabecalho-tabela">
                    <th scope="col">#</th>
                    <th scope="col">Cargo</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <!-- DADOS QUE VAO VIR DO BANCO -->
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Presidente</td>
                    <td><i class="bi bi-trash-fill"></i></td>
                    <td><i class="bi bi-pencil-fill"></i></td>
               
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Presidente - Turma</td>
                    <td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
  <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
</svg></i></td>
                    <td><i class="bi bi-pencil-fill"></i></td>
                    
                   
               
                </tr>
               
            </tbody>
        </table>
        <?php
            include 'bd.class.php' ; 
            $conn = OpenCon () ;  
            echo "Banco de dados conectado com sucesso!!" ; 
            CloseCon ( $conn ) ;
        ?>
    </main>
    <?php require_once("footer.html.php"); ?>

</body>

</html>
