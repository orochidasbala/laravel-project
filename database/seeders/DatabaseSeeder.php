<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::truncate();
        // Category::truncate();
        // Blog::truncate();
        // Comment::truncate();

        $mgmg = User::factory()->create(['name'=>'MgMg', 'username'=>'mgmg']);
        $aungsung = User::factory()->create(['name'=>'Aung Aung', 'username'=>'aungaung']);
        $frontend = Category::factory()->create(['name' => 'frontend', 'slug'=>'frontend']);
        $backend = Category::factory()->create(['name' => 'backend', 'slug'=>'backend']);

        Blog::factory(2)->create(['category_id' => $frontend->id, 'user_id'=>$mgmg->id]);
        Blog::factory(2)->create(['category_id' => $backend->id, 'user_id'=>$aungsung->id]);
    }
}
