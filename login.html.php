

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organograma - Login</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./bootstrap-5.2.1-dist/css/bootstrap.min.css">
    <link href="./fontawesome-free-6.2.0-web/css/all.min.css" rel="stylesheet">
</head>

<body>
    <?php require_once("header.html.php"); ?>
    
    <main id="Inicio_Conteudo" class="container">
        <div class="area-administrativa">
            <h2>Área Administrativa</h2>
            <h3>Acesso ao sistema</h3>
            <hr>

            <form id="login-form" method="POST" >
                <div class="parte-superior-formulario">
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="text" class="form-control" name="login" id="login" aria-describedby="emailHelp"
                            placeholder="Digite o seu login">
                        <div id="emailHelp" class="form-text">O login é o mesmo da rede da sua instituição judiciária.
                        </div>
                    </div>
                    <div class="mb-3 form-group">
                        <label for="senha" class="form-label">Senha</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite a sua senha">
                            <span id="togglePassword" class="input-group-text">
                                <i class="fa fa-eye-slash" id="icone-senha" ></i>
                            </span>
                        </div>
                        
                        <div id="passwordHelp" class="form-text">Digite a senha da rede da sua instituição judiciária.
                        </div>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                          <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </symbol>
                    </svg>
                    <?php
                        require_once("./conf.php");

                        $login = isset($_POST['login']) ? $_POST['login']: null; 
                        $erros = array();

                        if ($login) {
                            
                            require_once('./admin/sessao.class.php');
                            
                            $senha = isset($_POST['senha'])? $_POST['senha']: null;
                            
                            if (Sessao::autentica($login, $senha, $mensagemErro)) {
                                
                                header('Location: /organograma-atualizado/bem-vindo.php');
                                exit;
                            } else {
                                
                                echo '<div id="alerta-senha" class="alert alert-danger align-items-center" role="alert">
                                        <svg class="bi flex-shrink-0 me-3" width="20" height="20" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                        <div>
                                            Login ou senha incorretos! Por favor, tente novamente.
                                        </div>
                                    </div>';
                                
                                $erros[] = $mensagemErro;
                            }
                        }
                    ?>
                </div>


                <div class="parte-inferior-formulario">
                    <div class="botoes">
                        <button type="button" id="botaoLimpar" class="btn botao btn-outline-primary"
                            title="Limpar campos de formulário">Limpar</button>
                        <input type="submit" id="botaoEntrar" class="btn botao btn-primary"
                            title="Logar no sistema" value="Entrar">
                    </div>

                </div>

            </form>
        </div>
    </main>
    <?php require_once("footer.html.php"); ?>

</body>

</html>
