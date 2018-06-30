<?php
/**
 * Connecto to an SMTP and send the given message
 */
function smtp_mail($to, $from, $message, $user, $pass, $host, $port)
{
	if ($h = fsockopen($host, $port))
	{
		$data = array(
			0,
			"EHLO $host",
			'AUTH LOGIN',
			base64_encode($user),
			base64_encode($pass),
			"MAIL FROM: <$from>",
			"RCPT TO: <$to>",
			'DATA',
			$message
		);
		foreach($data as $c)
		{
			$c && fwrite($h, "$c\r\n");
			while(substr(fgets($h, 256), 3, 1) != ' '){}
		}
		fwrite($h, "QUIT\r\n");
		return fclose($h);
	}
?>
