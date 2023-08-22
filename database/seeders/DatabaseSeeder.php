<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Page;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Page::factory(40)->create();
        $categories = Category::factory(4)->create();

        Page::All()->each(function ($page) use ($categories) {
            $page->categories()->attach(
                $categories->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
        //Page::factory(10)->create();
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'AdminUser',
            'email' => 'admin@admin.com',
            "password" => bcrypt("abc123456"),
//             'email_verified_at' => now(),
//             'remember_token' => rand(10),//'remember_token' => Str::random(10),
        ]);
    }
}
