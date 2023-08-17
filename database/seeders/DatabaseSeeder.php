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
        Page::factory(10)->create();
        $categories = Category::factory(4)->create();

        Page::All()->each(function ($page) use ($categories) {
            $page->categories()->attach(
                $categories->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
        //Page::factory(10)->create();
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
