<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CompanyTest extends TestCase
{

    /**First, because in the tests we are working with the database, we enable the RefreshDatabase trait. But don't forget to edit your phpunit.xml to ensure you're working on the testing database and not live!
    Next, we create a user. In the first test, we use the earlier added admin() state from the Factory.
    Then, acting as a newly-created user, we go to the companies.index route.
    Ant last, we check the response. The administrator will get a response HTTP status of 200 OK, and other users will receive an HTTP status of 403 Forbidden. */

    use RefreshDatabase;

    public function testAdminUserCanAccessCompaniesIndexPage(): void
    {
        $user = User::factory()->admin()->create();
        $response = $this->actingAs($user)->get(route('companies.index'));
        $response->assertOk();

    }

    public function testNonAdminUserCannotAccessCompaniesIndexPage(): void
    {
        $user = User::factory()->create();

        $res = $this->actingAs($user)->get(route('companies.index'));

        $res->assertForbidden();
    }
}
