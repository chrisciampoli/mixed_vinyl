<?php

namespace App\Service;

use Psr\Cache\CacheItemInterface;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class MixRepository
{
    public function __construct(
        private HttpClientInterface $githubContentClient,
        private CacheInterface $cache,
        bool $isDebug,
    ){}

    public function findAll(): array
    {
        return $this->cache->get('mixes_data', function (CacheItemInterface $cacheItem) {
            $cacheItem->expiresAfter(5);
            $response = $this->githubContentClient->request('GET', '/SymfonyCasts/vinyl-mixes/main/mixes.json');

            return $response->toArray();
        });
    }

}
