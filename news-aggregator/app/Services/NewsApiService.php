<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class NewsApiService
{
    protected $apiKey;

    public function __construct() {
        $this->apiKey = env('NEWS_API_KEY');
    }

    public function fetchTopHeadlines($category = null) {
        $params = [
            'apiKey' => $this->apiKey,
            'country' => 'in'
        ];

        if ($category) {
            $params['category'] = strtolower($category);
        }

        $response = Http::get('https://newsapi.org/v2/top-headlines', $params);

        return $response->successful() ? $response->json()['articles'] : [];
    }
}
