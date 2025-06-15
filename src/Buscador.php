<?php

namespace Alura\BuscadorDeCursos;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Symfony\Component\DomCrawler\Crawler;

class Buscador
{
    public function __construct(private ClientInterface $httpClient, private Crawler $crawler)
    {
    }

    public function buscar(string $url): array
    {
        $resposta = $this->httpClient->request('GET', $url);
        $html = $resposta->getBody();
        $this->crawler->addHtmlContent($html);
        $elementos = $this->crawler->filter('span.card-curso__nome');
        $cursos = [];

        foreach ($elementos as $elemento) {
            $cursos[] = $elemento->textContent;
        }
        return $cursos;
    }
}