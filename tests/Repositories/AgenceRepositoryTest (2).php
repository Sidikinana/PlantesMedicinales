<?php namespace Tests\Repositories;

use App\Models\Agence;
use App\Repositories\AgenceRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class AgenceRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var AgenceRepository
     */
    protected $agenceRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->agenceRepo = \App::make(AgenceRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_agence()
    {
        $agence = factory(Agence::class)->make()->toArray();

        $createdAgence = $this->agenceRepo->create($agence);

        $createdAgence = $createdAgence->toArray();
        $this->assertArrayHasKey('id', $createdAgence);
        $this->assertNotNull($createdAgence['id'], 'Created Agence must have id specified');
        $this->assertNotNull(Agence::find($createdAgence['id']), 'Agence with given id must be in DB');
        $this->assertModelData($agence, $createdAgence);
    }

    /**
     * @test read
     */
    public function test_read_agence()
    {
        $agence = factory(Agence::class)->create();

        $dbAgence = $this->agenceRepo->find($agence->id);

        $dbAgence = $dbAgence->toArray();
        $this->assertModelData($agence->toArray(), $dbAgence);
    }

    /**
     * @test update
     */
    public function test_update_agence()
    {
        $agence = factory(Agence::class)->create();
        $fakeAgence = factory(Agence::class)->make()->toArray();

        $updatedAgence = $this->agenceRepo->update($fakeAgence, $agence->id);

        $this->assertModelData($fakeAgence, $updatedAgence->toArray());
        $dbAgence = $this->agenceRepo->find($agence->id);
        $this->assertModelData($fakeAgence, $dbAgence->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_agence()
    {
        $agence = factory(Agence::class)->create();

        $resp = $this->agenceRepo->delete($agence->id);

        $this->assertTrue($resp);
        $this->assertNull(Agence::find($agence->id), 'Agence should not exist in DB');
    }
}
