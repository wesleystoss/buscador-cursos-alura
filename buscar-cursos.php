<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;
use Alura\BuscadorDeCursos\Buscador;
    
$client = new Client(['base_uri' => 'https://www.alura.com.br/']);
$crawler = new Crawler();

$buscador = new Buscador($client, $crawler);
$cursos = $buscador->buscar(url:'cursos-online-programacao');

echo "Lista de cursos encontrados (" . count($cursos) . "):" . PHP_EOL;
$indice = 1;
foreach ($cursos as $curso) {
    echo "#" . $indice . " - " . $curso . PHP_EOL;
    $indice++;
}