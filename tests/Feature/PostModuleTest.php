<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PostModuleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @testdox Un post pertenece a un autor
     */
    function a_post_belongs_to_an_author()
    {
        // $this->markTestIncomplete();

        $user = User::factory()->create();
        $post = Post::factory()->create([
            'author_id' => $user->id,
        ]);

        $this->assertInstanceOf(BelongsTo::class, $post->author());
        $this->assertInstanceOf(User::class, $post->author);
        $this->assertTrue($post->author->is($user));
    }

    /**
     * @test
     * @testdox Un post pertenece a muchas categorías (o un post tiene muchas categorías).
     */
    /** @test */
    function a_post_belongs_to_many_categories()
    {
        $post = Post::factory()->create();

        $eloquent = Category::factory()->create([
            'title' => 'Eloquent',
        ]);

        $laravel = Category::factory()->create([
            'title' => 'Laravel',
        ]);
        
        $php = Category::factory()->create([
            'title' => 'PHP',
        ]);

        $post->categories()->syncWithoutDetaching($eloquent);
        $post->addCategories($laravel, $php);

        $this->assertInstanceOf(BelongsToMany::class, $post->categories());
        $this->assertInstanceOf(Collection::class, $post->categories);

        $this->assertCount(3, $post->categories);

        $this->assertSame(['Eloquent','Laravel', 'PHP'], $post->categories->pluck('title')->all());
    }
}
