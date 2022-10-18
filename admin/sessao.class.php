<?php 

require_once("./conf.php");
// require_once("../db.class.php");
// require_once('usuario.class.php');

if (!session_id()) session_start();

class Sessao {
	public static function autentica($login, $senha, &$erro) {
		$login = strtolower($login);
		$usuarios = explode(';', Configuracao::usuarios_administradores);
		
		if (!in_array($login, $usuarios)) {
			$erro = 'Usuário não autorizado';
			return FALSE;
		}
		
		if (!$senha) {
			$erro = 'Login ou senha incorretos';
			return FALSE;
		}
		
		$conn = ldap_connect(Configuracao::ldap_host);
		if ($conn && $senha) {
			ldap_set_option($conn, LDAP_OPT_PROTOCOL_VERSION, 3);
			$bind = @ldap_bind($conn, $login.'@'.Configuracao::ldap_dominio, $senha);
			# die(var_dump($bind));
			ldap_close($conn);
			if ($bind) {
				// $db = new ConexaoBanco;
				// $um = new UsuarioManager($db);
				// $usuario = $um->consulta($login);
				// if (!$usuario){
				// 	$usuario = $um->insere($login);
				// }
				// $db->close();
				$_SESSION['usuario'] = $usuario;
				
				#die(var_dump($_SESSION));
				
				return TRUE;
			
				
			} else {
				
				error_log('erro durante autenticação LDAP: usuário '.$login.', '.__FILE__);
				$erro  = 'Login ou senha incorretos';
				echo '<script>console.log("erro durante autenticação LDAP: usuário '.$login.'")</script>';
                echo '<script type="text/javascript">$("alerta-senha").addClass("mostrar-alerta")</script>';
				
				return FALSE;
				
                
			}
		} else {
			error_log('erro ao conectar ao servidor LDAP '.Configuracao::ldap_host.', '.__FILE__);
			$erro = 'Erro durante conexão com servidor LDAP';
			return FALSE;
		}
	}
	
	public static function encerra(){
		$_SESSION = array();
		if (isset($_COOKIE[session_name()])) {
			setcookie(session_name(), '', time()-42000, '/');
		}
		session_destroy();
	}
	
	public static function usuario() {
		return isset($_SESSION['usuario'])? $_SESSION['usuario']: null;
	}
	
}
