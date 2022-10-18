

<?php

require_once('sessao.class.php');

Sessao::encerra();

header('Location: index.php');

?>