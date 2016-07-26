<?php
echo exec('whoami');
exit;
require("vendor/autoload.php");

// Initialisation de Crontab pour envoyer la newsletter à une certaine date
$crontabRepository = new TiBeN\CrontabManager\CrontabRepository(new TiBeN\CrontabManager\CrontabAdapter());

// Envoi de la newsletter à chaque inscrit
$crontabJob = new TiBeN\CrontabManager\CrontabJob();
$crontabJob->hours = '13';
$crontabJob->minutes = '12';
$crontabJob->dayOfMonth = '*';
$crontabJob->months = '*';
$crontabJob->dayOfWeek = '*';
$crontabJob->taskCommandLine = 'php /www/projects/blog/sendmail.php';

$crontabRepository->addJob($crontabJob);
$crontabRepository->persist();