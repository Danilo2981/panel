<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class CategoryModuleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @testdox Una categoría tiene muchos posts.
     */
    function a_category_has_many_posts()
    {
        $category = Category::factory()->create();

        $firstPost = Post::factory()->create();
        $secondPost = Post::factory()->create();

        $category->posts()->attach($firstPost);
        $category->posts()->attach($secondPost);

        $this->assertInstanceOf(BelongsToMany::class, $category->posts());
        $this->assertInstanceOf(Collection::class, $category->posts);
        $this->assertCount(2, $category->posts);

        $posts = $category->posts->all();
        $this->assertTrue($posts[0]->is($firstPost));
        $this->assertTrue($posts[1]->is($secondPost));
    }
}
