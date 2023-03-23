<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use App\Models\User;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test user registration is successful (registration is disabled for this project).
     *
     * @return void
     */
    /*
    public function test_user_registration_success()
    {
        //$this->withoutExceptionHandling();

        $response = $this->post('/register', [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('users', [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
        ]);
    }*/

    /**
     * Test user registration fails (registration is disabled for this project).
     *
     * @return void
     */
    public function test_user_registration_fails()
    {
        //$this->withoutExceptionHandling();

        $response = $this->post('/register', [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertStatus(404);
        $this->assertDatabaseMissing('users', [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
        ]);
    }

    /**
     * Test user login.
     *
     * @return void
     */
    public function test_user_login()
    {
        //$this->withoutExceptionHandling();

        $user = User::factory()->create([
            'email' => 'johndoe@example.com',
            'password' => Hash::make('password'),
        ]);

        $response = $this->post('/login', [
            'email' => 'johndoe@example.com',
            'password' => 'password',
        ]);

        $response->assertStatus(302);
        $this->assertAuthenticatedAs($user);
    }

    /**
     * Test lost password functionality.
     *
     * @return void
     */
    /*
    public function test_lost_password()
    {
        //$this->withoutExceptionHandling();

        $user = User::factory()->create([
            'email' => 'johndoe@example.com',
        ]);

        $response = $this->post('/password/email', [
            'email' => 'johndoe@example.com',
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseHas('password_resets', [
            'email' => 'johndoe@example.com',
        ]);

        $token = \DB::table('password_resets')
            ->where('email', 'johndoe@example.com')
            ->first()
            ->token;

        $response = $this->post('/password/reset', [
            'token' => $token,
            'email' => 'johndoe@example.com',
            'password' => 'newpassword',
            'password_confirmation' => 'newpassword',
        ]);

        $response->assertStatus(302);
        $this->assertDatabaseMissing('password_resets', [
            'email' => 'johndoe@example.com',
        ]);
    }
    */
}
