<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_log_in()
    {
        factory(User::class)->create([
            'username' => 'johndoe',
        ]);
        $this->assertGuest();

        $response = $this->get('/');
        $response->assertRedirect('/login');

        $response = $this->post('/login', [
            'username' => 'johndoe',
            'password' => 'secret',
        ]);
        $response->assertRedirect('/');
        $this->assertAuthenticated();
    }

    /** @test */
    public function users_cannot_authenticate_with_invalid_credentials()
    {
        factory(User::class)->create([
            'username' => 'johndoe',
            'password' => bcrypt('secret'),
        ]);
        $this->assertGuest();

        $this->from('/login');
        $response = $this->post('/login', [
            'username' => 'johndoe',
            'password' => 'wrongpassword',
        ]);
        $response->assertRedirect('/login')
            ->assertSessionHasErrorsIn('default', ['username']);
        $this->assertGuest();
    }

    /** @test */
    public function users_can_register()
    {
        $this->from('/register');

        $response = $this->post('/register', [
            'name' => 'John Doe',
            'username' => 'johndoe',
            'email' => 'john@example.com',
            'password' => 'secret',
            'password_confirmation' => 'secret',
        ]);
        $response->assertRedirect('/');
        $this->assertDatabaseHas('users', [
            'name' => 'John Doe',
            'username' => 'johndoe',
            'email' => 'john@example.com',
        ]);
    }

    /** @test */
    public function name_is_required_to_register_new_users()
    {
        $this->from('/register');

        $response = $this->post('/register', [
            'username' => 'johndoe',
            'email' => 'john@example.com',
            'password' => 'secret',
            'password_confirmation' => 'secret',
        ]);
        $response->assertRedirect('/register')
            ->assertSessionHasErrorsIn('default', ['name']);
        $this->assertDatabaseMissing('users', [
            'name' => 'John Doe',
        ]);
    }

    /** @test */
    public function username_is_required_to_register_new_users()
    {
        $this->from('/register');

        $response = $this->post('/register', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'secret',
            'password_confirmation' => 'secret',
        ]);
        $response->assertRedirect('/register')
            ->assertSessionHasErrorsIn('default', ['username']);
        $this->assertDatabaseMissing('users', [
            'username' => 'johndoe',
        ]);
    }

    /** @test */
    public function email_is_required_to_register_new_users()
    {
        $this->from('/register');

        $response = $this->post('/register', [
            'name' => 'John Doe',
            'username' => 'johndoe',
            'password' => 'secret',
            'password_confirmation' => 'secret',
        ]);
        $response->assertRedirect('/register')
            ->assertSessionHasErrorsIn('default', ['email']);
        $this->assertDatabaseMissing('users', [
            'email' => 'john@example.com',
        ]);
    }

    /** @test */
    public function password_is_required_to_register_new_users()
    {
        $this->from('/register');

        $response = $this->post('/register', [
            'name' => 'John Doe',
            'username' => 'johndoe',
            'email' => 'john@example.com',
        ]);
        $response->assertRedirect('/register')
            ->assertSessionHasErrorsIn('default', ['password']);
        $this->assertDatabaseMissing('users', [
            'email' => 'john@example.com',
        ]);
    }

    /** @test */
    public function password_must_be_confirmed_to_register_new_users()
    {
        $this->from('/register');

        $response = $this->post('/register', [
            'name' => 'John Doe',
            'username' => 'johndoe',
            'email' => 'john@example.com',
            'password' => 'secret',
        ]);
        $response->assertRedirect('/register')
            ->assertSessionHasErrorsIn('default', ['password']);
        $this->assertDatabaseMissing('users', [
            'email' => 'john@example.com',
        ]);
    }

    // /** @test */
    // public function show_env_variable()
    // {
    //     $this->assertEquals('STYDE12345.#!', env('TEST_KEY'));
    // }
}
