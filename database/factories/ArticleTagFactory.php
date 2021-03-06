<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ArticleTagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'article_id' => DB::select('SELECT id FROM articles ORDER BY RANDOM() LIMIT 1')[0]->id,
            'tag_id' => DB::select('SELECT id FROM tags ORDER BY RANDOM() LIMIT 1')[0]->id
        ];
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles_tags')->insert([
            'article_id' => DB::select('SELECT id FROM articles ORDER BY RANDOM() LIMIT 1')[0]->id,
            'tag_id' => DB::select('SELECT id FROM tags ORDER BY RANDOM() LIMIT 1')[0]->id
        ]);
    }
}
