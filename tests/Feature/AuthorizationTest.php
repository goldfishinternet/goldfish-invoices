<?php
namespace Tests\Feature;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;
use App\Models\User;
use App\Models\Role;

class AuthorizationTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_cannot_access_admin_page()
    {
        // Attempt to access the admin area
        $response = $this->get('/admin');

        // Assert that the user can access the admin area
        $response->assertStatus(302);
    }

    public function test_admin_role_can_access_admin_page()
    {
        //$this->withoutExceptionHandling();

        // Create user
        $user = User::factory()->create([
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'remember_token'    => null,
            'email_verified_at' => now(),
            'is_approved'       => true,
            'locale'            => '',
        ]);

        Role::create([
            'id'=>1,
            'title'=>'Admin'
        ]);

        // Add to Admin Role
        $user->roles()->sync(1);

        $response = $this->post('/login', [
            'email' => 'admin@example.com',
            'password' => 'password',
        ]);

        // Get the authenticated user from the response
        $authenticatedUser = Auth::user();

        // Assert that the user is authenticated
        $this->assertTrue(Auth::check());

        // Attempt to access the dashboard
        $response = $this->get('/admin');

        // Assert that the user can access the dashboard
        $response->assertStatus(200);
        $response->assertSee('You are logged in as administrator!');

        // Assert that the authenticated user is the same as the original user
        $this->assertEquals($user->id, $authenticatedUser->id);
    }

    public function test_user_role_cannot_access_admin_page()
    {
        // Create user
        $user = User::factory()->create([
            'email' => 'guest@example.com',
            'password' => Hash::make('password'),
            'remember_token'    => null,
            'email_verified_at' => now(),
            'is_approved'       => true,
            'locale'            => '',
        ]);

        Role::create([
            'id'=>2,
            'title'=>'User'
        ]);

        // Add to User Role
        $user->roles()->sync(2);

        $response = $this->post('/login', [
            'email' => 'guest@example.com',
            'password' => 'password',
        ]);

        // Get the authenticated user from the response
        $authenticatedUser = Auth::user();

        // Assert that the user is authenticated
        $this->assertTrue(Auth::check());

        // Attempt to access the dashboard
        $response = $this->get('/admin');

        // Assert that the user can access the dashboard
        $response->assertStatus(302);

        // Assert that the authenticated user is the same as the original user
        $this->assertEquals($user->id, $authenticatedUser->id);
    }


}
