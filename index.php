<?php
// Fichier dans lequel enregistrer les données
$logfile = './logs.txt';

// Récupération des données GET et POST
$data = [
    'timestamp' => date('Y-m-d H:i:s'),
        'method'    => $_SERVER['REQUEST_METHOD'],
	    'get'       => $_GET,
	        'post'      => $_POST,
		    'ip'        => $_SERVER['REMOTE_ADDR'] ?? 'unknown'
		    ];

// Conversion en texte lisible
$entry = "-----\n" . print_r($data, true) . "\n";

// Écriture dans le fichier avec verrouillage
file_put_contents($logfile, $entry, FILE_APPEND | LOCK_EX);

// Réponse simple
echo "Données enregistrées.";
?>