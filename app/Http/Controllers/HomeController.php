<?php

namespace App\Http\Controllers;

use App\Jobs\FetchCategoriesAndSubcategories;
use App\Jobs\ImportMainCats;
use App\Models\Category;
use App\Models\MainCats;
use App\Models\Product;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\DomCrawler\Crawler;
use Illuminate\Support\Facades\Storage;
use App\Jobs\ScrapeCategoryImages;
use App\Jobs\StoreProductData;
use App\Models\SubCategory;
use Goutte\Client;

class HomeController extends Controller
{
    public function checkenv()
    {
        dd(env('TOKEN_TELEGRAM') . ' ' . env('TOKEN_TELEGRAM_CHAT_ID'));
    }
    public function index()
    {
        $categorys = Category::has('subcategories')->get();
        $sliders = Slider::get();
        $main_cats = MainCats::get();
        
 $hasOrder = SubCategory::where('is_homepage', 1)->whereNotNull('order')->exists();

    $subcategory = SubCategory::with('products')
        ->where('is_homepage', 1)
        ->when($hasOrder, function ($query) {
            $query->orderBy('order', 'asc');
        }, function ($query) {
            $query->orderBy('created_at', 'desc');
        })
        ->get();
                return view('frontend.index', compact('categorys', 'sliders', 'main_cats', 'subcategory'));
    }
    public function single_product($id)
    {
        $product = Product::find($id);
        return view('frontend.single_product', compact('product'));
    }
    public function category($slug)
    {
        $category = SubCategory::where('slug', $slug)->first();
        return view('frontend.category', compact('category'));
    }
    public function page($page)
    {

        return view('frontend.page', compact('page'));
    }

    public function csrab()
{
    set_time_limit(300); // 5 دقائق

    MainCats::truncate();

    try {
        $response = Http::timeout(120)->get('https://ploteam-sa.store');
    } catch (\Exception $e) {
        return "Error fetching URL: " . $e->getMessage();
    }

    if ($response->successful()) {
        $htmlContent = $response->body();
        $crawler = new Crawler($htmlContent);

        $count = 0;
        $crawler->filter('div.text-center')->each(function (Crawler $node) use (&$count) {
            if ($node->filter('img')->count() && $node->filter('p')->count()) {
                $imageUrl = $node->filter('img')->attr('src');
                $text = $node->filter('p')->text();

                try {
                    $imageContents = file_get_contents($imageUrl);
                    $imageName = basename($imageUrl);
                    $path = 'categories/' . uniqid() . '_' . $imageName;
                    Storage::disk('public')->put($path, $imageContents);
                } catch (\Exception $e) {
                    // تجاهل الخطأ أو تسجيله
                    return;
                }

                MainCats::create([
                    'title' => $text,
                    'image' => $path,
                ]);

                $count++;
            }
        });

        return "Import completed successfully. Imported items: " . $count;
    } else {
        return "Failed to get content from the URL.";
    }
}



    private function convertToFloat($value)
    {
        $value = preg_replace('/[^0-9.]/', '', $value);
        return (float)$value;
    }
}
