<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;
use Alura\BuscadorDeCursos\Buscador;
    
$client = new Client(['base_uri' => 'https://www.alura.com.br/']);
$crawler = new Crawler();

$buscador = new Buscador($client, $crawler);
$cursos = $buscador->buscar(url:'cursos-online-programacao');

$totalCursos = count($cursos);
echo "Lista de cursos encontrados ($totalCursos):" . PHP_EOL;

foreach ($cursos as $indice => $curso) {
    exibeMensagem($curso);
}

