<?php

require_once('../_helpers/strip.php');

libxml_disable_entity_loader(true); // Désactive les entités externes (inutile en PHP 8+)

$xml = !empty($_GET['xml']) ? $_GET['xml'] : '<root><content>No XML found</content></root>';

$document = new DOMDocument();
$document->loadXML($xml, LIBXML_NONET); // Empêche les requêtes externes dangereuses
$parsedDocument = simplexml_import_dom($document);

echo htmlspecialchars($parsedDocument->content, ENT_QUOTES, 'UTF-8'); // Sécurise l'affichage
