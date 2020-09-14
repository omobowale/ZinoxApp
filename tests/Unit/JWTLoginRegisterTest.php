<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;
use App\User;

class JWTLoginRegisterTest extends TestCase
{
    use RefreshDatabase;

    /**
     * setUp function to refresh and seed the database
     *
     */

    public function setUp(): void
    {
        parent::setUp();

        //seed the database
        $this->artisan('db:seed');
    }

    /**
     * Register a random user and get success message.
     *
     * @return void
     */

    public function test_Register()
    {
        $this->withoutExceptionHandling();
        $baseUrl = Config::get('app.url') . '/api/register';

        $response = $this->json('POST', $baseUrl . '/', [
            'name' => 'user',
            'email' => 'user@gmail.com',
            'password' => '147258stiga',
            'password_confirmation' => '147258stiga',
        ]);

        $response->assertJsonStructure(['message', 'user']);
    }

    /**
     * Login as default API user and get token back.
     *
     * @return void
     */
    public function test_if_token_will_be_generated_at_successful_login()
    {
        $this->withoutExceptionHandling();

        //Get the base url
        $baseUrl = Config::get('app.url') . '/api/login';

        //Get an email - default email
        $email = Config::get('api.apiEmail');

        //Get a password - default password
        $password = Config::get('api.apiPassword');

        $response = $this->json('POST', $baseUrl . '/', [
            'email' => $email,
            'password' => $password,
        ]);

        $response
            ->assertStatus(200)
            ->assertJsonStructure(['access_token', 'token_type', 'expires_in']);
    }

    /**
     * Login as default API user and get token back.
     *
     * @return void
     */

    public function test_login_if_user_does_not_exist()
    {
        $this->withoutExceptionHandling();

        //Create a new user using the factory
        $user = factory(User::class)->create();

        //Log the user in
        $this->actingAs($user);
        $baseUrl = Config::get('app.url') . '/api/login';

        $response = $this->json('POST', $baseUrl . '/', [
            'email' => $user->email,
            'password' => $user->password,
        ]);

        $response->assertStatus(401);
    }

    public function test_login_if_email_and_password_are_not_validated()
    {
        $this->withoutExceptionHandling();

        $baseUrl = Config::get('app.url') . '/api/login';

        $response = $this->json('POST', $baseUrl . '/', [
            'email' => '',
            'password' => '',
        ]);

        $response->assertStatus(422);
    }
}
