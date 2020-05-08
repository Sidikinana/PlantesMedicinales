<?php

namespace App\Http\Controllers;

use App\Models\Vertue;
use App\Models\Plante;
use App\Models\ZoneRencontree;
use App\Models\RegionPratiquee;
use App\Models\PartieUtilisee;
use App\DataTables\VertueDataTable;
use App\Http\Requests\CreateVertueRequest;
use App\Http\Requests\UpdateVertueRequest;
use App\Repositories\VertueRepository;
use App\Repositories\PlanteRepository;
use App\Repositories\RegionPratiqueeRepository;
use App\Repositories\PartieUtiliseeRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;
use Elasticsearch\ClientBuilder;

use Illuminate\Http\Request;


use App\Events\NewVertueEvent;



    class VertueController extends AppBaseController
    {
        /** @var  VertueRepository */
        private $vertueRepository;
        private $planteRepository;
        private $regionPratiqueeRepository;
        private $partieUtiliseeRepository;


        //Modification 04/05/2020
        protected $client;
        //Fin modifications

        public function __construct(VertueRepository $vertueRepo, RegionPratiqueeRepository $regionPratiqueeRepo,  PartieUtiliseeRepository $partieUtiliseeRepo, PlanteRepository $planteRepo)
        {
            $this->vertueRepository = $vertueRepo;
            $this->regionPratiqueeRepository = $regionPratiqueeRepo;
            $this->partieUtiliseeRepository = $partieUtiliseeRepo;
            $this->planteRepository = $planteRepo;

            //Ajouter 04/05/2020
            $this->client = ClientBuilder::create()->build();
            //Fin modifications
           
        }

        /**
         * Display a listing of the Vertue.
         *
         * @param VertueDataTable $vertueDataTable
         * @return Response
         */
        public function index(VertueDataTable $vertueDataTable)
        {
            /*$vertues = Vertue::with('partieutilisee')->get();
            $vertues = Vertue::with('regionpratiquee')->get();
            $vertues = Vertue::with('plante')->get();*/
            return $vertueDataTable->render('vertues.index');
        }

        /**
         * Show the form for creating a new Vertue.
         *
         * @return Response
         */
        public function create()
        {
    		$partieUtilisees  = $this->partieUtiliseeRepository->model()::pluck('nomPartie','id'); 
            $regionPratiquees = $this->regionPratiqueeRepository->model()::pluck('nomRegion','id');
            $plantes = $this->planteRepository->model()::pluck('nomScientifique','id');
            return view('vertues.create')->with('partieUtilisees', $partieUtilisees)->with('plantes', $plantes)->with('regionPratiquees',$regionPratiquees);

        }

        /**
         * Store a newly created Vertue in storage.
         *
         * @param CreateVertueRequest $request
         *
         * @return Response
         */
        public function store(CreateVertueRequest $request)
        {
            
            $input = $request->all();

            $vertue = $this->vertueRepository->create($input);
            $this->save($vertue);
            Flash::success('Vertue saved successfully.');

           // return redirect(route('vertues.index'));
        }

        public function save($vertues){
            //return $vertues;
            //print($vertues->plante->zoneRencontrees);
            //$plante= Plante::where('nomScientifique',$request->plante);
            $data = [
                'index' => 'vertues',
                'type' => 'vertues',
                'id' => $vertues->id,
                'body' => [
                    'nomVertue' =>$vertues->nomVertue,
                    'recette'   => $vertues->recette,
                    'utilisation' => $vertues->utilisation, 
                    'plantes' => $vertues->plante,
                    'zoneRencontree' => $vertues->plante->zoneRencontrees,
                    'nomPartie' => $vertues->partieutilisee->nomPartie,
                    'regionPratiquees' =>$vertues->regionpratiquee,
                ]
            ];

            $client = ClientBuilder::create()->build();
            $return = $client->index($data);
            if($return)
                print("okkkkkkk");
            else
                print("Non okkkk");
        }

        /**
         * Display the specified Vertue.
         *
         * @param  int $id
         *
         * @return Response
         */
        public function show($id)
        {
            $vertue = $this->vertueRepository->find($id);

            if (empty($vertue)) {
                Flash::error('Vertue not found');

                return redirect(route('vertues.index'));
            }

            return view('vertues.show')->with('vertue', $vertue);
        }

        /**
         * Show the form for editing the specified Vertue.
         *
         * @param  int $id
         *
         * @return Response
         */
        public function edit($id)
        {
            $vertue = $this->vertueRepository->find($id);

            if (empty($vertue)) {
                Flash::error('Vertue not found');

                return redirect(route('vertues.index'));
            }

            return view('vertues.edit')->with('vertue', $vertue);
        }

        /**
         * Update the specified Vertue in storage.
         *
         * @param  int              $id
         * @param UpdateVertueRequest $request
         *
         * @return Response
         */
        public function update($id, UpdateVertueRequest $request)
        {
            $vertue = $this->vertueRepository->find($id);

            if (empty($vertue)) {
                Flash::error('Vertue not found');

                return redirect(route('vertues.index'));
            }

            $vertue = $this->vertueRepository->update($request->all(), $id);

            Flash::success('Vertue updated successfully.');

            return redirect(route('vertues.index'));
        }

        /**
         * Remove the specified Vertue from storage.
         *
         * @param  int $id
         *
         * @return Response
         */
        public function destroy($id)
        {
            $vertue = $this->vertueRepository->find($id);

            if (empty($vertue)) {
                Flash::error('Vertue not found');

                return redirect(route('vertues.index'));
            }

            $this->vertueRepository->delete($id);

            Flash::success('Vertue deleted successfully.');

            return redirect(route('vertues.index'));
        }


        public function search(Request $request)
        {
            if($request->has('text') && $request->input('text')) {
    
                // Search for given text and return data
                $data = $this->searchVertues($request->input('text'));
                $vertuesArray = [];
    
                // If there are any vertues that match given search text "hits" fill their id's in array
                if($data['hits']['total'] > 0) {
    
                    foreach ($data['hits']['hits'] as $hit) {
                        $vertuesArray[] = $hit['_source']['id'];
                    }
                }
    
                // Retrieve found vertues from database
                //$vertues = vertues::with('partiulisees')
                               //->whereIn('id', $vertuesArray)
                               //->get();


                $vertues = $this->vertueRepository->find($vertuesArray);    
                // Return to view with data
                return view('vertues.index', ['vertue' => $vertues]);
            } else {
                return redirect()->route('welcome');
            }
        }
    
        function searchVertues(Request $request)
        {
            $text=$request->text;
            $params = [
                'index' => 'vertues',
                'type' => 'vertues',
                'body' => [
                    'sort' => [
                        '_score'
                    ],
                    'query' => [
                        'bool' => [
                            'should' => [
                                ['match' => [
                                    'nomVertue' => [
                                        'query'     => $text,
                                        'fuzziness' => '1'
                                    ]
                                ]],

                                ['match' => [
                                    'recette' => [
                                        'query'     => $text,
                                        'fuzziness' => '0'
                                    ]
                                ]],

                                ['match' => [
                                    'nomPartie' => [
                                        'query'     => $text,
                                        'fuzziness' => '0'
                                    ]
                                ]],

                                ['match' => [
                                    'utlisation' => [
                                        'query'     => $text,
                                        'fuzziness' => '0'
                                    ]
                                ]]
                            ]
                        ],
                    ],
                ]
            ];
    
            $data = $this->client->search($params);
            //return $data;
            if($data)
                return view('welcome');
            else
                print("Non okkkk");
        }
    }
