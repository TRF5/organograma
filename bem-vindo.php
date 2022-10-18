<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organograma - Página Inicial</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./bootstrap-5.2.1-dist/css/bootstrap.min.css">
</head>

<body>
    <?php require_once("header.html.php"); ?>
    <main id="Inicio_Conteudo" class="container">
        <h1>BEM-VINDO</h1>
        <?php
            include 'bd.class.php' ; 
            $conn = OpenCon () ;  
            echo "Conectado com sucesso" ; 
            CloseCon ( $conn ) ;
        ?>
    </main>
    <?php require_once("footer.html.php"); ?>

</body>

</html>