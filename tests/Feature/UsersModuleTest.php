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

        $this->get("/users/{$user->id}")
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
    
    /** @test */
    public function the_name_is_required()
    {
        $this->from('users/nuevo')
            ->post(route('users.store'), [
                'name' => '',
                'email' => 'danilo.vega.lopez@gmail.com',
                'password' => '123456'
        ])->assertRedirect('users/nuevo')
          ->assertSessionHasErrors(['name' => 'El campo nombre es obligatorio']);

        $this->assertDatabaseMissing('users', [
            'email' => 'danilo.vega.lopez@gmail.com',
        ]);
    }

    /** @test */
    public function the_email_is_required()
    {
        $this->from('users/nuevo')
            ->post(route('users.store'), [
                'name' => 'Danilo',
                'email' => '',
                'password' => '123456'
        ])->assertRedirect('users/nuevo')
          ->assertSessionHasErrors(['email']);

        $this->assertEquals(0, User::count());
    }

    /** @test */
    public function the_email_must_be_valid()
    {
        $this->from('users/nuevo')
            ->post(route('users.store'), [
                'name' => 'Danilo',
                'email' => 'correo-no-valido',
                'password' => '123456'
        ])->assertRedirect('users/nuevo')
          ->assertSessionHasErrors(['email']);

        $this->assertEquals(0, User::count());
    }

    /** @test */
    public function the_email_must_be_unique()
    {
        User::factory()->create([
            'email' => 'danilo.vega@hotmail.es'
        ]);

        $this->from('users/nuevo')
            ->post(route('users.store'), [
                'name' => 'Danilo',
                'email' => 'danilo.vega@hotmail.es',
                'password' => '123456'
        ])->assertRedirect('users/nuevo')
          ->assertSessionHasErrors(['email']);

        $this->assertEquals(1, User::count());
    }

     /** @test */
     public function the_password_is_required()
     {
         $this->from('users/nuevo')
             ->post(route('users.store'), [
                 'name' => 'Danilo',
                 'email' => 'danilo.vega@hotmail.es',
                 'password' => ''
         ])->assertRedirect('users/nuevo')
           ->assertSessionHasErrors(['password']);
 
         $this->assertEquals(0, User::count());
     }

      /** @test */
      public function the_password_is_min_6_charaters()
      {
          $this->from('users/nuevo')
              ->post(route('users.store'), [
                  'name' => 'Danilo',
                  'email' => 'danilo.vega@hotmail.es',
                  'password' => '12'
          ])->assertRedirect('users/nuevo')
            ->assertSessionHasErrors(['password']);
  
          $this->assertEquals(0, User::count());
      }

       /** @test */
       public function it_loads_the_edit_user_page()
       {
            $this->withoutExceptionHandling();

            $user = User::factory()->create();

            $this->get("/users/{$user->id}/edit")
                ->assertStatus(200)
                ->assertViewIs('users.edit')
                ->assertSee('Editar Usuario')
                ->assertViewHas('user', $user);
       }
       
       /** @test */
    public function it_updates_a_new_user()
    {
        // $this->withoutExceptionHandling();

        $user = User::factory()->create();

        $this->put("/users/{$user->id}", [
            'name' => 'Danilo',
            'email' => 'danilo.vega.lopez@gmail.com',
            'password' => '123456'
        ])->assertRedirect("users/{$user->id}");

        $this->assertCredentials([
            'name' => 'Danilo',
            'email' => 'danilo.vega.lopez@gmail.com',
            'password' => '123456'
        ]);
    }

    /** @test */
    public function the_name_is_required_when_updating_a_user()
    {
        // $this->withoutExceptionHandling();

        $user = User::factory()->create();

        $this->from("users/{$user->id}/edit")
            ->put("users/{$user->id}", [
                'name' => '',
                'email' => 'danilo.vega.lopez@gmail.com',
                'password' => '123456'
        ])->assertRedirect("users/{$user->id}/edit")
          ->assertSessionHasErrors(['name']);

        $this->assertDatabaseMissing('users', [
            'email' => 'danilo.vega.lopez@gmail.com',
        ]);
    }

    /** @test */
    public function the_email_is_required_when_updating_a_user()
    {
        $user = User::factory()->create();

        $this->from("users/{$user->id}/edit")
            ->put("users/{$user->id}", [
                'name' => 'Danilo',
                'email' => '',
                'password' => '123456'
        ])->assertRedirect("users/{$user->id}/edit")
          ->assertSessionHasErrors(['email']);

        $this->assertDatabaseMissing('users', [
            'name' => 'Danilo',
        ]);
    }

    /** @test */
    public function the_email_must_be_valid_when_updating_a_user()
    {
        $user = User::factory()->create();

        $this->from("users/{$user->id}/edit")
            ->put("users/{$user->id}", [
                'name' => 'Danilo',
                'email' => 'otro tipo de correo',
                'password' => '123456'
        ])->assertRedirect("users/{$user->id}/edit")
          ->assertSessionHasErrors(['email']);

        $this->assertDatabaseMissing('users', [
            'name' => 'Danilo',
        ]);
    }

    /** @test */
    public function the_email_must_be_unique_when_updating_a_user()
    {
        // $this->withoutExceptionHandling();        

        User::factory()->create([
            'email' => 'existing@email.com'
        ]);

        $user = User::factory()->create([
            'email' => 'danilo.vega@hotmail.es'
        ]);

        $this->from("users/{$user->id}/edit")
            ->put("users/{$user->id}", [
                'name' => 'Danilo',
                'email' => 'existing@email.com',
                'password' => '123456'
        ])->assertRedirect("users/{$user->id}/edit")
          ->assertSessionHasErrors(['email']);

        // $this->assertEquals(1, User::count());
    }

    /** @test */
    public function the_users_email_can_stay_the_same_when_updating_the_user()
    {
       // $this->withoutExceptionHandling();
       $user = User::factory()->create([
           'email' => 'danilo.vega.lopez@gmail.com'
       ]);

       $this->from("users/{$user->id}/edit")
           ->put("users/{$user->id}", [
               'name' => 'Danilo',
               'email' => 'danilo.vega.lopez@gmail.com',
               'password' => '123456789'
       ])->assertRedirect("users/{$user->id}");

       $this->assertDatabaseHas('users', [
           'name' => 'Danilo',
           'email' => 'danilo.vega.lopez@gmail.com'
       ]);
   }

     /** @test */
     public function the_password_is_optional_when_updating_a_user()
     {
        // $this->withoutExceptionHandling();

        $oldPassword = 'CLAVE_ANTERIOR';

        $user = User::factory()->create([
            'password' => bcrypt($oldPassword)
        ]);

        $this->from("users/{$user->id}/edit")
            ->put("users/{$user->id}", [
                'name' => 'Danilo',
                'email' => 'danilo.vega.lopez@gmail.com',
                'password' => ''
        ])->assertRedirect("users/{$user->id}");

        $this->assertCredentials([
            'name' => 'Danilo',
            'email' => 'danilo.vega.lopez@gmail.com',
            'password' => $oldPassword
        ]);
    }

     /** @test */
     public function it_deletes_a_user()
     {
        $this->withoutExceptionHandling();

        $user = User::factory()->create();

        $this->delete("users/{$user->id}")
            ->assertRedirect('users');

        $this->assertDatabaseMissing('users', [
            'id' => $user->id
        ]);
    }
    
}
