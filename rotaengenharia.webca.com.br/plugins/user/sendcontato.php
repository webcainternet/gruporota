<?php
	ini_set('display_errors','On');
	ini_set("sendmail_from","adm@rotaconstrutora.com.br");
	
	

	$pnome = $_POST["nome"];
	$pemail = $_POST["email"];
	$ptelefone = $_POST["telefone"];
	$passunto = $_POST["assunto"];
	$pmensagem = $_POST["mensagem"];
	

	$to = 'adm@rotaconstrutora.com.br';
	$subject = 'Contato através do site - Rota Engenharia';

	// message
	$message = "
	<html>
	<body bgcolor='#F8F8F8'>
	  <p>Contato atraves do site - Rota Engenharia</p>
	  <table>
		<tr>
		  <td>Nome</td><td>$pnome</td>
		</tr>
		<tr>
		  <td>Email</td><td>$pemail</td>
		</tr>
		<tr>
		  <td>Telefone</td><td>$ptelefone</td>
		</tr>
		<tr>
		  <td>Assunto</td><td>$passunto</td>
		</tr>
		<tr>
		  <td>Mensagem</td><td>$pmensagem</td>
		</tr>
	  </table>
	</body>
	</html>
	";

	// To send HTML mail, the Content-type header must be set
	$headers  = 'MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

	// Additional headers
	$headers .= 'To: Grupo Rota <'.$to . "\r\n";
	$headers .= 'From: Grupo Rota <'.$to . "\r\n";

	// Mail it
	mail($to, $subject, $message, $headers);
?><center>
Mensagem enviada!