<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;

class EditProductSlugs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'products:edit-slugs';

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
    $products = Product::all();

    if ($products->isEmpty()) {
        $this->info("No products found.");
        return;
    }

    foreach ($products as $product) {
        $oldSlug = $product->slug;
        $newSlug = (string) $product->id;

        $product->slug = $newSlug;
        // $product->slug = \Illuminate\Support\Str::slug($product->name . '-' . \Illuminate\Support\Str::random(5));

        $product->save();

        $this->info("Updated Product ID {$product->id} - Slug: {$product->slug} ");
    }

    $this->info("✅ All slugs have been updated to product IDs.");
}

}
