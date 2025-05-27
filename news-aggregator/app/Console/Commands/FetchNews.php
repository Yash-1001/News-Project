<?php

namespace App\Console\Commands;
use App\Models\Category;
use App\Models\Article;
use App\Models\Source;
use App\Services\NewsApiService;

use Illuminate\Console\Command;

class FetchNews extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:fetch-news';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
   public function handle()
{
    $newsService = new NewsApiService();
    $categories = Category::all();

    foreach ($categories as $category) {
        $this->info("Fetching news for category: {$category->name}");

        $articles = $newsService->fetchTopHeadlines($category->name);

        foreach ($articles as $item) {
            if (empty($item['title'])) continue;

            // Get or create the source
            $source = Source::firstOrCreate([
                'name' => $item['source']['name'] ?? 'Unknown'
            ]);

            // Save or update article
            Article::updateOrCreate(
                ['title' => $item['title']], // use title as a unique constraint
                [
                    'description'   => $item['description'] ?? null,
                    'url'           => $item['url'] ?? null,
                    'urlToImage'    => $item['urlToImage'] ?? null,
                    'author'        => $item['author'] ?? 'Unknown',
                    'publishedAt'   => $item['publishedAt'] ?? now(),
                    'category_id'   => $category->id,
                    'source_id'     => $source->id,
                ]
            );
        }
    }

    $this->info('✅ News fetched and saved successfully!');
}

}
