<?php

namespace App\Jobs;

use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Storage;

class StoreProductData implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    protected $productData;
    protected $categoryId;

    public function __construct($productData, $categoryId)
    {
        $this->productData = $productData;
        $this->categoryId = $categoryId;
    }

    public function handle()
    {
        // تخزين الصورة في الـ Storage
        $imagePath = null;
        if ($this->productData['image']) {
            // حفظ الصورة في الـ Storage
            $imagePath = $this->storeImage($this->productData['image']);
        }

        // تخزين بيانات المنتج
        Product::create([
            'name' => $this->productData['name'],
            'image' => $imagePath,
            'price' => $this->productData['price'],
            'discount' => $this->productData['discount_value'],
            'sub_category_id' => $this->categoryId,
            'description' => $this->productData['description'],
        ]);
    }

    private function storeImage($imageUrl)
    {
        // تحميل الصورة من الرابط
        $image = file_get_contents($imageUrl);
        $imageName = basename($imageUrl); // استخدام اسم الصورة كما هو
        $path = 'products/' . $imageName;

        // حفظ الصورة في الـ Storage
        Storage::disk('public')->put($path, $image);
        
        return $path;
    }
}
