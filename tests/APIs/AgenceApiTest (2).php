<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Agence;

class AgenceApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_agence()
    {
        $agence = factory(Agence::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/agences', $agence
        );

        $this->assertApiResponse($agence);
    }

    /**
     * @test
     */
    public function test_read_agence()
    {
        $agence = factory(Agence::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/agences/'.$agence->id
        );

        $this->assertApiResponse($agence->toArray());
    }

    /**
     * @test
     */
    public function test_update_agence()
    {
        $agence = factory(Agence::class)->create();
        $editedAgence = factory(Agence::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/agences/'.$agence->id,
            $editedAgence
        );

        $this->assertApiResponse($editedAgence);
    }

    /**
     * @test
     */
    public function test_delete_agence()
    {
        $agence = factory(Agence::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/agences/'.$agence->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/agences/'.$agence->id
        );

        $this->response->assertStatus(404);
    }
}
