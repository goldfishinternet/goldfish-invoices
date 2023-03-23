<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use App\Models\User;

class URLTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function application_returns_a_successful_response()
    {
        //$this->withoutExceptionHandling();

        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    /** @test */
    public function guest_users_are_redirected_to_login()
    {
        //$this->withoutExceptionHandling();

        // Attempt to access the route as a guest user
        $response = $this->get('/admin');

        // Assert that the guest user is redirected to the login page
        $response->assertRedirect('/login');
    }

    /** @test */
    public function registered_users_can_login_and_access_home()
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

        // Get the authenticated user from the response
        $authenticatedUser = Auth::user();

        // Assert that the user is authenticated
        $this->assertTrue(Auth::check());

        // Attempt to access the dashboard
        $response = $this->get('/');

        // Assert that the user can access the dashboard
        $response->assertStatus(200);
        $response->assertSee('You are logged in!');

        // Assert that the authenticated user is the same as the original user
        $this->assertEquals($user->id, $authenticatedUser->id);
    }
}
