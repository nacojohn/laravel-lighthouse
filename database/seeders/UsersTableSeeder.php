<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Article::truncate();
        Article::unguard();

        User::factory()->count(5)->create()->each(function ($user) {
            $articles = Article::factory()->count(3)->make();
            $user->articles()->saveMany($articles);
        });
    }
}
