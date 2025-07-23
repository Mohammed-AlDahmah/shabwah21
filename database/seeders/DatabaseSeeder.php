<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            CategorySeeder::class,
            SiteSettingsSeeder::class,
            UsersSeeder::class,
            AuthorsSeeder::class,
            ArticleSeeder::class,
            VideoSeeder::class,
            SpecialArticlesSeeder::class,
            AboutAndContactPagesSeeder::class,
        ]);
    }
}
