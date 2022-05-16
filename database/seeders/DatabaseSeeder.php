<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Blog;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Category::truncate();
        Blog::truncate();

        $frontend = Category::factory()->create(['name' => 'frontend']);
        $backend = Category::factory()->create(['name' => 'backend']);

        Blog::factory(5)->create(['category_id' => $frontend->id]);
        Blog::factory(4)->create(['category_id' => $backend->id]);
    }
}
