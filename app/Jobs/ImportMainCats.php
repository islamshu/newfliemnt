<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Symfony\Component\DomCrawler\Crawler;
use App\Models\MainCats;

class ImportMainCats implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle(): void
    {


        $response = Http::timeout(60)->get('https://ploteam-sa.store');

        if ($response->successful()) {
            $htmlContent = $response->body();
            $crawler = new Crawler($htmlContent);

            $crawler->filter('div.text-center')->each(function (Crawler $node) {
                if ($node->filter('img')->count() && $node->filter('p')->count()) {
                    $imageUrl = $node->filter('img')->attr('src');
                    $text = $node->filter('p')->text();

                    try {
                        $imageContents = file_get_contents($imageUrl);
                        $imageName = basename($imageUrl);
                        $path = 'categories/' . uniqid() . '_' . $imageName;
                        Storage::disk('public')->put($path, $imageContents);
                    } catch (\Exception $e) {
                        return;
                    }

                    MainCats::create([
                        'title' => $text,
                        'image' => $path,
                    ]);
                }
            });
        }
    }
}
