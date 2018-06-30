<?php
/*
This is a very tiny proof-of-concept SMTP client. Currently it's over 320 characters (if the var names are compressed). Think you can build one smaller?
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
}


ini_set('default_socket_timeout', 3);

$user = 'AKIAIPRRKW423KRL4V5Q';
$pass = 'Ap2Jm3eJB4qm9fryXnEoWiOdvZXKwaGI6CFTX2bzB3Kw';
$host = 'email-smtp.us-east-1.amazonaws.com';
//$host = 'ssl://email-smtp.us-east-1.amazonaws.com'; //Amazon SES
$port = 25;

$to = 'dmh@llacox.com';
$from = 'noreply@chihuahuamarket.mx';
$template = "Subject: =?UTF-8?B?VGVzdCBFbWFpbA==?=\r\n"
."To: <dmh@llacox.com>\r\n"
."From: <noreply@chihuahuamarket.mx>\r\n"
."MIME-Version: 1.0\r\n"
."Content-Type: text/html; charset=utf-8\r\n"
."Content-Transfer-Encoding: base64\r\n\r\n"
."PGgxPlRlc3QgRW1haWw8L2gxPjxwPkhlbGxvIFRoZXJlITwvcD4=\r\n.";


if(smtp_mail($to, $from, $template, $user, $pass, $host, $port))
{
	echo "Mail sent\n\n";
}
else
{
	echo "Some error occured\n\n";
}
?>
