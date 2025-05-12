<?php

namespace App\Console\Commands;

use Database\Seeders\ShopSeeder;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Throwable;

class ShopSeedCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'shop:seed {--products=10 : Number of products to generate}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seed the shop database with products, variants, and images.';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $products = (int) $this->option('products');

        try {
            // Set config value to be used by seeder
            config(['shop_seed.products' => $products]);

            Log::info("Starting shop seeding process with {$products} products...");

            $this->call(ShopSeeder::class);

            $this->info("✅ Successfully seeded {$products} products.");
            Log::info("Shop seeding process completed.");

            return self::SUCCESS;

        } catch (Throwable $e) {
            Log::error("❌ Shop seeding failed: " . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
            ]);

            $this->error("Error during shop seeding: {$e->getMessage()}");
            return self::FAILURE;
        }
    }
}
