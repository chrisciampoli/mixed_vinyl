<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SongAPIController extends AbstractController
{
    #[Route('/api/songs/{id<\d+>}', name: 'api_songs_get_one', methods: ['GET'])]
    public function getSong(int $id, LoggerInterface $logger): Response
    {
        $logger->info('SongAPIController::getSong() called',
            ['song' => $id]
        );

        $song = [
            'id' => $id,
            'title' => 'Song ' . $id,
            'artist' => 'Artist ' . $id,
        ];

        return $this->json($song);
    }
}
