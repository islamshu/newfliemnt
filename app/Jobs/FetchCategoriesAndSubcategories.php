<?php
namespace App\Jobs;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\DomCrawler\Crawler;

class FetchCategoriesAndSubcategories implements ShouldQueue
{
    use Dispatchable, Queueable, InteractsWithQueue;

    // العدد المسموح به من المحاولات قبل الفشل
    public $tries = 3;

    // الوظيفة الرئيسية التي تنفذ المهمة
    public function handle()
    {
        // إرسال الطلب إلى الموقع
        $response = Http::get('https://albayader-uae.store/');
        
        if ($response->successful()) {
            // تحميل الـ HTML إلى Crawler
            $crawler = new Crawler($response->body());
            $categories = $crawler->filter('.main_catss');

            // التأكد من وجود الفئات الرئيسية
            if ($categories->count()) {
                $categories->each(function ($node) {
                    // استخراج اسم الفئة الرئيسية
                    $mainCategoryName = $node->filter('.main_catss_title')->text(); 

                    // حفظ الفئة الرئيسية
                    $category = Category::create([
                        'name' => $mainCategoryName,
                    ]);

                    // العثور على الفئات الفرعية
                    $subcategories = $node->filter('.subcategory-class');
                    
                    if ($subcategories->count()) {
                        // تقسيم الفئات الفرعية إلى مهام أصغر
                        $subcategories->each(function ($subnode) use ($category) {
                            $subCategoryName = $subnode->filter('.subcategory-class_title')->text();

                            // استخراج الصورة إن وجدت
                            $imageName = $subnode->filter('a')->attr('span');
                            $imagePath = null;

                            if (!empty($imageName)) {
                                $imageUrl = "https://albayader-uae.store/uploads/". $imageName;
                                $imagePath = $this->storeImage($imageUrl);
                            }

                            // حفظ الفئة الفرعية
                            SubCategory::create([
                                'name' => $subCategoryName,
                                'image' => $imagePath,
                                'category_id' => $category->id, // ربط الفئة الفرعية بالفئة الرئيسية
                            ]);
                        });
                    }
                });
            }
        }
    }

    // دالة لتحميل الصورة وتخزينها في التخزين
    private function storeImage($imageUrl)
    {
        $imageContent = file_get_contents($imageUrl);
        $imageName = basename($imageUrl);
        $path = 'subcategories/' . $imageName;

        // تخزين الصورة في الـ Storage
        Storage::disk('public')->put($path, $imageContent);

        return $path;  // إرجاع مسار الصورة المخزنة
    }
}