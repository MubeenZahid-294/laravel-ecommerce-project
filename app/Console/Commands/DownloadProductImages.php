<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;

class DownloadProductImages extends Command
{
    protected $signature = 'products:download-images';
    protected $description = 'Download product images locally';

    public function handle()
    {
        $images = [
            'Women\'s Scarf'         => 'https://fakestoreapi.com/img/71z3kpMAYsL._AC_UY879_.jpg',
            'Laptop Stand'           => 'https://fakestoreapi.com/img/61IBBVJvSDL._AC_SY879_.jpg',
            'Resistance Bands Set'   => 'https://fakestoreapi.com/img/61pHAEJ4NML._AC_UX679_.jpg',
            'Air Fryer'              => 'https://fakestoreapi.com/img/81fAZal24fL._AC_UY879_.jpg',
            'Scented Candles Pack'   => 'https://fakestoreapi.com/img/71li-ujtlUL._AC_UX679_.jpg',
            'Face Mask Set'          => 'https://fakestoreapi.com/img/71YXzeOuslL._AC_UY879_.jpg',
            'Lipstick Collection'    => 'https://fakestoreapi.com/img/71pWzhdJNwL._AC_UL640_FMwebp_QL65_.jpg',
        ];

        foreach ($images as $productName => $url) {
            $product = Product::where('name', $productName)->first();
            if (!$product) {
                $this->warn("Product not found: $productName");
                continue;
            }

            try {
                $response = Http::timeout(10)->get($url);
                if ($response->successful()) {
                    $filename = 'products/' . \Str::slug($productName) . '.jpg';
                    Storage::disk('public')->put($filename, $response->body());
                    $product->update(['image' => $filename]);
                    $this->info("✅ Downloaded: $productName");
                } else {
                    $this->warn("❌ Failed: $productName");
                }
            } catch (\Exception $e) {
                $this->warn("❌ Error: $productName — " . $e->getMessage());
            }
        }

        $this->info('Done!');
    }
}