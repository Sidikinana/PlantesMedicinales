<?php

namespace App\Console\Commands\Bulk;

use App\Models\Vertue;
use Elasticsearch\ClientBuilder;
use Illuminate\Console\Command;

class ImportToElasticSearch extends Command
{
    const ELASTIC_INDEX = "vertues";
    const ELASTIC_TYPE  = "vertues";

    protected $client;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:data-to-elasticsearch';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Imports all data from database to Elasticsearch service';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        // Initialize Elasticsearch client
        $this->client = ClientBuilder::create()->build();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // When importing, delete old data and insert new from database
        $reset = $this->resetIndex();

        if ($reset) {
            echo "========= Import Start ============" . PHP_EOL;
            $start_time = microtime(true);
            $total = $this->importVertues();
            $end_time = microtime(true);
            echo "========= Import End ==============" . PHP_EOL;
            echo "Time elapsed: " . round($end_time-$start_time, 2) . ' seconds' . PHP_EOL;
            echo "Total " . $total . " jobs were imported to ElasticSearch" . PHP_EOL;
        } else {
            echo "Data is not imported";
        }
    }

    public function resetIndex()
    {
        $params = [
            'index' => Vertue::ELASTIC_INDEX
        ];

        // If index exists it will delete it (all data will be deleted) and create new one
        if ($this->client->indices()->exists($params)) {

            // Deleting index
            $response_delete = $this->client->indices()->delete($params);

            if ($response_delete['acknowledged']) {
                echo "Index '" . Vertue::ELASTIC_INDEX . "' successfully deleted" . PHP_EOL;

                // Creating new index
                $response_create = $this->client->indices()->create($params);

                if ($response_create['acknowledged']) {
                    echo "Index '" . Vertue::ELASTIC_INDEX . "' successfully created" . PHP_EOL;
                    return true;
                }

                echo "Failed to create index" . PHP_EOL;
                die();
            }

            echo "Failed to delete index" . PHP_EOL;
            die();
        } else {
            // Creating new index
            $response_create = $this->client->indices()->create($params);

            if ($response_create['acknowledged']) {
                return true;
            }

            echo "Failed to create index" . PHP_EOL;
            die();
        }
    }

    private function importVertues()
    {
        $start = microtime(true);

        // Get all Vertue data from database
        $vertues = Vertue::all();

        $end = microtime(true);

        $i = 0;
        echo "-- Got data in " . round($end - $start, 2) . " seconds" . PHP_EOL;

        $start = microtime(true);
        foreach ($vertues as $vertue) {

            // Add index and type data to array
            $data['body'][] = [
                'index' => [
                    '_index'    => Vertue::ELASTIC_INDEX,
                    '_type'     => Vertue::ELASTIC_TYPE
                ]
            ];

            // Vertue data that will be required for later search
            $data['body'][] = [
                'id'            => $vertue->id,
                'nomVertue'    => $vertue->nomVertue,
                'recette'      => $vertue->recette,
                'utilisation'  => $vertue->utilisation,
                'nomPartie'   => implode(',', $vertue->partieutilisees->pluck('nomPartie')->toArray()),
				'nomRegion'   => implode(',', $vertue->regionpratiquees->pluck('nomRegion')->toArray()),
				'nomScientifique'   => implode(',', $vertue->plantes->pluck('nomScientifique')->toArray()),
				'espece'   => implode(',', $vertue->plantes->pluck('espece')->toArray()),
				'famille'   => implode(',', $vertue->plantes->pluck('famille')->toArray()),
				'nomMoore'   => implode(',', $vertue->plantes->pluck('nomMoore')->toArray()),
				'nomDioula'   => implode(',', $vertue->plantes->pluck('nomDioula')->toArray()),
				'nomFulfulde'   => implode(',', $vertue->plantes->pluck('nomFulfulde')->toArray()),
				'enDanger'   => implode(',', $vertue->plantes->pluck('enDanger')->toArray()),
				'photo'   => implode(',', $vertue->plantes->pluck('photo')->toArray())
            ];

            $i++;
        }
        $end = microtime(true);
        echo "-- Filled array in " . round($end - $start, 2) . " seconds" . PHP_EOL;

        $start = microtime(true);

        // Execute Elasticsearch bulk command for indexing multiple data
        $response = $this->client->bulk($data);

        $end = microtime(true);
        echo "-- Uploaded in " . round($end - $start, 2) . " seconds" . PHP_EOL;
        return $i;
    }
}
