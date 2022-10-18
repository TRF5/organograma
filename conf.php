<?php

class Configuracao {
	# Nome do Portal
	const nome_portal = "Organograma";

	// # Configurações de banco de dados postgres
	// const db_host = "127.0.0.1";
	// const db_porta = 5432;
	// const db_banco = "reservas";
	// const db_usuario = "reservas";
	// const db_senha = "reservas";

	const db_mensagem_indisponibilidade = "Sistema temporariamente indisponível. Tente novamente em alguns minutos.";

	# LDAP
	const ldap_host = "192.168.9.11";
	const ldap_dominio = "trf5.gov.br";
	const usuarios_administradores = "rpereira;e_rvcosta;anaclaudia";

	# envio de email
	const envio_email = TRUE;


	// # url base
	// const url_base = "http://127.0.0.1/jantar-posse";
}