<?php

namespace App\Listeners;

use App\Events\NewVertueEvent;
use App\Models\Vertue;
use Elasticsearch\ClientBuilder;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewVertueListener
{
    protected $client;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        $this->client = ClientBuilder::create()->build();
    }

    /**
     * Handle the event.
     *
     * @param    $event
     * @return void
     */
    public function handle(NewVertueEvent $event)
    {
        $this->addVertueToElasticSearch($event->vertue);
    }

    private function addVertueToElasticSearch(Vertue $vertue)
    {
        // Fill array with vertue data
        $data = [
            'body' => [
                'id'            => $vertue->id,
                'nomVertue'          => $vertue->nomVertue,
                'recette'          => $vertue->recette,
                'utilisation'   => $vertue->utilisation,
                'nomPartie'        => implode(',', $vertue->partiutilisees->pluck('nomPartie')->toArray()),
                'nomRegion'        => implode(',', $vertue->regionpratiquees->pluck('nomRegion')->toArray()),
                'nomScientifique'        => implode(',', $vertue->plante->pluck('nomScientifique')->toArray()),
                'espece'        => implode(',', $vertue->plante->pluck('espece')->toArray()),
                'famille'        => implode(',', $vertue->plante->pluck('famille')->toArray()),
                'nomMoore'        => implode(',', $vertue->plante->pluck('nomMoore')->toArray()),
                'nomDioula'        => implode(',', $vertue->plante->pluck('nomDioula')->toArray()),
                'nomFulfulde'        => implode(',', $vertue->plante->pluck('nomFulfulde')->toArray()),
                'enDanger'        => implode(',', $vertue->plante->pluck('enDanger')->toArray()),
                'photo'        => implode(',', $vertue->plante->pluck('photo')->toArray())

            ],
            'index' => Vertue::ELASTIC_INDEX,
            'type'  => Vertue::ELASTIC_TYPE,
        ];

        // Send request to index new movie
        $response = $this->client->index($data);

        return $response;
    }
}
