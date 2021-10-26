<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsersModuleTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_shows_the_users_lsit()
    {
        User::factory()->create(
            ['name' => 'Joel']
        );

        User::factory()->create(
            ['name' => 'Ellie']
        );

        $this->get('/users')
        ->assertStatus(200)
        ->assertSee('Listado de usuarios')
        ->assertSee('Joel')
        ->assertSee('Ellie');
    }

    /** @test */
    public function it_displays_the_users_details()
    {
        $user = User::factory()->create([
            'name' => 'Danilo Vega'
        ]);

        $this->get('/users/'.$user->id)
        ->assertStatus(200)
        ->assertSee('Danilo Vega');
    }

    /** @test */
    public function it_displays_a_404_error_if__the_user_is_not_found()
    {
        $this->get('/users/1999')
        ->assertStatus(404)
        ->assertSee('oops! Page not found');
    }

    /** @test */
    public function it_loads_the_the_new_user_page()
    {
        $this->get('/users/nuevo')
        ->assertStatus(200)
        ->assertSee('Crear nuevo usuario');
    }

    /** @test */
    public function it_creates_a_new_user()
    {
        $this->withoutExceptionHandling();

        $this->post(route('users.store'), [
            'name' => 'Danilo',
            'email' => 'danilo.vega.lopez@gmail.com',
            'password' => '123456'
        ])->assertRedirect(route('users'));

        $this->assertCredentials([
            'name' => 'Danilo',
            'email' => 'danilo.vega.lopez@gmail.com',
            'password' => '123456'
        ]);
    }

}
