<?php

namespace App\Services;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use RuntimeException;

class ApifyInstagramService
{
    public function extract(string $instagramUrl): array
    {
        $token = (string) config('services.apify.token');
        $actor = (string) config('services.apify.actor');
        $baseUrl = rtrim((string) config('services.apify.base_url'), '/');
        $encodedActor = rawurlencode($actor);

        if ($token === '') {
            throw new RuntimeException('APIFY_TOKEN is not configured.');
        }

        $runResponse = Http::timeout(120)
            ->acceptJson()
            ->post("{$baseUrl}/acts/{$encodedActor}/runs?token={$token}&waitForFinish=120&memory=1024&build=latest", [
                'directUrls' => [$instagramUrl],
                'resultsType' => 'posts',
                'resultsLimit' => 1,
                'addParentData' => false,
            ]);

        if (!$runResponse->successful()) {
            throw new RuntimeException('Failed to start Apify run: '.$runResponse->body());
        }

        $runData = $runResponse->json('data', []);
        $datasetId = Arr::get($runData, 'defaultDatasetId');
        $runId = Arr::get($runData, 'id');

        if (!$datasetId) {
            throw new RuntimeException('Apify did not return a dataset id.');
        }

        $itemsResponse = Http::timeout(60)
            ->acceptJson()
            ->get("{$baseUrl}/datasets/{$datasetId}/items", [
                'token' => $token,
                'clean' => true,
                'limit' => 1,
                'fields' => 'id,type,shortCode,url,videoUrl,displayUrl,audioUrl,timestamp,ownerUsername,ownerFullName,videoDuration,dimensionsHeight,dimensionsWidth,caption',
            ]);

        if (!$itemsResponse->successful()) {
            throw new RuntimeException('Failed to fetch Apify dataset items: '.$itemsResponse->body());
        }

        $item = $itemsResponse->json()[0] ?? [];
        $mediaUrl = $this->extractMediaUrl($item);
        $slimItem = $this->toSlimItem($item);

        return [
            'run_id' => $runId,
            'dataset_id' => $datasetId,
            'media_url' => $mediaUrl,
            'item' => $slimItem,
        ];
    }

    private function extractMediaUrl(array $item): ?string
    {
        $candidates = [
            'videoUrl',
            'video_url',
            'displayUrl',
            'display_url',
            'url',
            'contentUrl',
            'content_url',
        ];

        foreach ($candidates as $key) {
            $value = Arr::get($item, $key);
            if (is_string($value) && $value !== '') {
                return $value;
            }
        }

        return null;
    }

    private function toSlimItem(array $item): array
    {
        return Arr::only($item, [
            'id',
            'type',
            'shortCode',
            'url',
            'videoUrl',
            'displayUrl',
            'audioUrl',
            'timestamp',
            'ownerUsername',
            'ownerFullName',
            'videoDuration',
            'dimensionsHeight',
            'dimensionsWidth',
            'caption',
        ]);
    }
}
