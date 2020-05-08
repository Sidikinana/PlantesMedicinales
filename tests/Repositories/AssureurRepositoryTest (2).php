<?php namespace Tests\Repositories;

use App\Models\Assureur;
use App\Repositories\AssureurRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class AssureurRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var AssureurRepository
     */
    protected $assureurRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->assureurRepo = \App::make(AssureurRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_assureur()
    {
        $assureur = factory(Assureur::class)->make()->toArray();

        $createdAssureur = $this->assureurRepo->create($assureur);

        $createdAssureur = $createdAssureur->toArray();
        $this->assertArrayHasKey('id', $createdAssureur);
        $this->assertNotNull($createdAssureur['id'], 'Created Assureur must have id specified');
        $this->assertNotNull(Assureur::find($createdAssureur['id']), 'Assureur with given id must be in DB');
        $this->assertModelData($assureur, $createdAssureur);
    }

    /**
     * @test read
     */
    public function test_read_assureur()
    {
        $assureur = factory(Assureur::class)->create();

        $dbAssureur = $this->assureurRepo->find($assureur->id);

        $dbAssureur = $dbAssureur->toArray();
        $this->assertModelData($assureur->toArray(), $dbAssureur);
    }

    /**
     * @test update
     */
    public function test_update_assureur()
    {
        $assureur = factory(Assureur::class)->create();
        $fakeAssureur = factory(Assureur::class)->make()->toArray();

        $updatedAssureur = $this->assureurRepo->update($fakeAssureur, $assureur->id);

        $this->assertModelData($fakeAssureur, $updatedAssureur->toArray());
        $dbAssureur = $this->assureurRepo->find($assureur->id);
        $this->assertModelData($fakeAssureur, $dbAssureur->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_assureur()
    {
        $assureur = factory(Assureur::class)->create();

        $resp = $this->assureurRepo->delete($assureur->id);

        $this->assertTrue($resp);
        $this->assertNull(Assureur::find($assureur->id), 'Assureur should not exist in DB');
    }
}
