<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UsersModuleTest extends TestCase
{
    /** @test */
    public function it_loads_the_users()
    {
        $this->get('/users')
        ->assertStatus(200)
        ->assertSee('Usuarios');
    }

    /** @test */
    public function it_loads_the_users_details_page()
    {
        $this->get('/users/5')
        ->assertStatus(200)
        ->assertSee('Mostrando detalle del usuario: 5');
    }

    /** @test */
    public function it_loads_the_the_new_user_page()
    {
        $this->get('/users/nuevo')
        ->assertStatus(200)
        ->assertSee('Crear nuevo usuario');
    }

}
