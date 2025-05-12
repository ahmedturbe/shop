<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Variant;
use App\Models\Image;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $numProducts = (int) config('shop_seed.products', 10);

        Product::factory($numProducts)->create()->each(function ($product) {
            // 1 picture/product
            Image::factory()->create([
                'imageable_id' => $product->uuid,
                'imageable_type' => Product::class,
            ]);

            $variantCount = rand(1, 2000);

            Variant::factory($variantCount)->create([
                'product_uuid' => $product->uuid,
            ])->each(function ($variant) {
                $imageCount = rand(0, 20);

                Image::factory($imageCount)->create([
                    'imageable_id' => $variant->uuid,
                    'imageable_type' => Variant::class,
                ]);
            });
        });
    }
}
