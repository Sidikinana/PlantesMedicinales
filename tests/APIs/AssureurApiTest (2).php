<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Assureur;

class AssureurApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_assureur()
    {
        $assureur = factory(Assureur::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/assureurs', $assureur
        );

        $this->assertApiResponse($assureur);
    }

    /**
     * @test
     */
    public function test_read_assureur()
    {
        $assureur = factory(Assureur::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/assureurs/'.$assureur->id
        );

        $this->assertApiResponse($assureur->toArray());
    }

    /**
     * @test
     */
    public function test_update_assureur()
    {
        $assureur = factory(Assureur::class)->create();
        $editedAssureur = factory(Assureur::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/assureurs/'.$assureur->id,
            $editedAssureur
        );

        $this->assertApiResponse($editedAssureur);
    }

    /**
     * @test
     */
    public function test_delete_assureur()
    {
        $assureur = factory(Assureur::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/assureurs/'.$assureur->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/assureurs/'.$assureur->id
        );

        $this->response->assertStatus(404);
    }
}
