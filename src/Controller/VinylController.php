<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use function Symfony\Component\String\u;

class VinylController
{
    #[Route('/')]
    public function homepage(): Response
    {
        return new Response('Welcome to the homepage!');
    }

    #[Route('/browse/{genre}')]
    public function browse(Request $request, string $genre = null): Response
    {
        if (!$genre) {
            $genre = 'all';
        }

        $title = str_replace('-', ' ', $genre);
        $title = u(ucwords($title));

        return new Response('You are browsing the ' . $genre . ' genre!');
    }
}
