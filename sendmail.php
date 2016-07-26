<?php require("vendor/autoload.php");

// Connexion à la BDD
$strConnection = 'mysql:host=localhost;dbname=blog;charset=utf8';
$pdo = new PDO($strConnection, 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

// Récupération des données de la newsletter
$stmt = $pdo->query('SELECT title, content FROM newsletters WHERE sendDate = "'.date('Y-m-d').'"');
$st = $pdo->query('SELECT email FROM subscriptions');
$mails = $st->fetchAll();
$news = $stmt->fetchAll();

foreach ($mails as $mail) {
	foreach ($news as $new) {
		sendMail($mail['email'], $new['title'], $new['content']);
	}
}

function sendMail($destMail, $title, $content, $sender='marielle010495@gmail.com', $senderName='Benjamin Cerbai') 
{
    $mail = new \PHPMailer();

    $mail->isSMTP();                                        // On va se servir de SMTP
    $mail->Host = 'smtp.gmail.com';                 // Serveur SMTP
    $mail->SMTPAuth = true;                                 // Active l'autentification SMTP
    $mail->Username = 'mail.wf3@gmail.com';                 // SMTP username
    $mail->Password = 'mailwf3741';                         // SMTP password
    $mail->SMTPSecure = 'tls';                              // TLS Mode
    $mail->Port = 587;                                      // Port TCP à utiliser

    $mail->Sender=$sender;
    $mail->setFrom($sender, $senderName, false);
    $mail->addAddress($destMail);          // Ajouter un destinataire
    $mail->addReplyTo($sender, $senderName);
    $mail->addCC('cc@example.com');
    $mail->addBCC('bcc@example.com');

    $mail->isHTML(true);                                     // Set email format to HTML

    $mail->Subject = $title;
    $mail->Body    = $content . '<footer> Vous souhaitez vous désabonner de la newsletter ? <a href="http://localhost/public/mail/unsubscribe/'.$destMail.'">Cliquez ici</a> ! </footer>';
    $mail->AltBody = strip_tags($content. 'Vous souhaitez vous désabonner de la newsletter ? http://localhost/public/mail/unsubscribe/'.$destMail.' Copiez/collez ce lien dans votre navigateur !');

    if(!$mail->send()) {
        echo 'Le message n\'a pas pu être envoyé';
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
        echo 'Le message a été envoyé';
    }
}
