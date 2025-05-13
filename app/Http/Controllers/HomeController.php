<?php

namespace App\Http\Controllers;

use App\Jobs\FetchCategoriesAndSubcategories;
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
    public function checkenv(){
        dd(env('TOKEN_TELEGRAM').' '.env('TOKEN_TELEGRAM_CHAT_ID'));
    }
    public function index()
    {
        $categorys = Category::has('subcategories')->get();
        $sliders = Slider::get();
        $main_cats = MainCats::get();
        $subcategory = SubCategory::with('products')->where('is_homepage',1)->orderby('created_at','desc')->get();
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
    // نكرر من 22 إلى 39
    for ($categoryId = 22; $categoryId <= 39; $categoryId++) {

        echo "جاري معالجة الفئة رقم: $categoryId<br>";

        $response = Http::get("https://albayader-uae.store/categories.php?category_id=$categoryId");

        if ($response->successful()) {
            $htmlContent = $response->body();

            if (empty($htmlContent)) {
                echo "لم يتم تحميل محتوى الفئة رقم $categoryId<br>";
                continue; // ننتقل للفئة التالية
            }

            $crawler = new Crawler($htmlContent);

            try {
                $title = $crawler->filter('.cat_title')->text();
            } catch (\Exception $e) {
                echo "لم يتم العثور على عنوان الفئة لـ category_id=$categoryId<br>";
                continue; // ننتقل للفئة التالية
            }

            $cat = SubCategory::where('name', $title)->first();

            if (!$cat) {
                echo "لم يتم العثور على الفئة في قاعدة البيانات: $title<br>";
                continue;
            }

            $subcategory_id = $cat->id;

            echo "اسم الفئة: $title (ID: $subcategory_id) <br>";

            $products = $crawler->filter('.productscats');

            if ($products->count() > 0) {
                $products->each(function ($node) use ($subcategory_id) {
                    try {
                        $productName = $node->filter('.productName')->text();
                        $price = (int) $node->filter('.price_after')->text();
                        $dicount = (int) $node->filter('.descount')->text();
                        $desc = $node->filter('.detls')->text();
                        $productImage = 'https://albayader-uae.store/' . $node->filter('.product-entry__image img')->attr('src');

                        StoreProductData::dispatch([
                            'name' => $productName,
                            'image' => $productImage,
                            'price' => $price,
                            'discount_value' => $dicount,
                            'description' => $desc,
                        ], $subcategory_id);

                        echo "تم إضافة منتج: $productName<br>";
                    } catch (\Exception $e) {
                        echo "خطأ أثناء معالجة منتج في الفئة ID: $subcategory_id<br>";
                        // ممكن تسجيل الخطأ لو أردت
                    }
                });
            } else {
                echo "لم يتم العثور على منتجات للفئة: $title<br>";
            }
        } else {
            echo "فشل تحميل الفئة ID: $categoryId<br>";
        }

        echo "<hr>"; // خط فاصل بين الفئات
    }
}



    private function convertToFloat($value)
    {
        $value = preg_replace('/[^0-9.]/', '', $value);
        return (float)$value;
    }
}
