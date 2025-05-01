<?php
namespace App\Jobs;

use App\Models\MainCats;
use Illuminate\Support\Facades\Storage;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ScrapeCategoryImages implements ShouldQueue
{
    use Dispatchable, Queueable, SerializesModels;

    public $categoryName;
    public $imgUrl;

    public function __construct($categoryName, $imgUrl)
    {
        $this->categoryName = $categoryName;
        $this->imgUrl = $imgUrl;
    }

    public function handle()
    {
        // تحميل الصورة من الرابط
        $imageContent = file_get_contents($this->imgUrl);

        // إنشاء اسم للصورة باستخدام اسم الملف من الرابط
        $imageName = basename($this->imgUrl);

        // تحديد المسار الذي سيتم حفظ الصورة فيه داخل public/storage
        $path = 'categories/' . $imageName;

        // تخزين الصورة في مجلد public/storage
        Storage::disk('public')->put($path, $imageContent);

        // تخزين البيانات في قاعدة البيانات مع مسار الصورة
        MainCats::create([
            'title' => $this->categoryName,
            'image' => $path, // حفظ المسار في قاعدة البيانات
        ]);
    }
}
