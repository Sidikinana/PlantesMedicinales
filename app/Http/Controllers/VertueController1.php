<?php

namespace App\Http\Controllers;

use App\Models\Vertue;
use App\Models\Plante;
use App\Models\ZoneRencontree;
use App\Models\RegionPratiquee;
use App\Models\PartieUtilisee;
use App\DataTables\VertueDataTable;
use App\Http\Requests;
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

    class VertueController extends AppBaseController
    {
        /** @var  VertueRepository */
        private $vertueRepository;
        private $planteRepository;
        private $regionPratiqueeRepository;
        private $partieUtiliseeRepository;

        public function __construct(VertueRepository $vertueRepo, RegionPratiqueeRepository $regionPratiqueeRepo,  PartieUtiliseeRepository $partieUtiliseeRepo, PlanteRepository $planteRepo)
        {
            $this->vertueRepository = $vertueRepo;
            $this->regionPratiqueeRepository = $regionPratiqueeRepo;
            $this->partieUtiliseeRepository = $partieUtiliseeRepo;
            $this->planteRepository = $planteRepo;
           
        }

        /**
         * Display a listing of the Vertue.
         *
         * @param VertueDataTable $vertueDataTable
         * @return Response
         */
        public function index(VertueDataTable $vertueDataTable)
        {
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
            print($request);
            $input = $request->all();

            $vertue = $this->vertueRepository->create($input);

            Flash::success('Vertue saved successfully.');

            return redirect(route('vertues.index'));
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



        public function search_vertues(CreateVertueRequest $request){
            //return view('search_vertues');
            print($request);
            $plante= Plante::where('nomScientifique',$request->plante);
            $data = [
                'index' => 'vertues',
                'type' => 'vertues',
                'id' => 'vertues->id',
                'body' => [
                    'nomVertue' =>'',
                    'recette'   => '',
                    'utilisation' => '', 
                    'plantes' => [
                        'nomScientifique' => $plante->nomScientifique,
                        'espece' => $plante->espece,
                        'famille' => $plante->famille,
                        'nomMoore' => $plante->nomMoore,
                        'nomDioula' => $plante->nomDioula,
                        'nomFulfulde' => $plante->nomFulfulde,
                        'enDanger'=> $plante->enDanger,
                        'photo'=> $plante->photo,
                    ],
                    'zoneRencontree' => [
                        'nomZone' => '',
                        'longitude' => '',
                        'latitude' => '',
                    ],
                    'nomPartie' => '',
                    'regionPratiquees' => [
                        'nomRegion' => '',
                        'longitude' => '',
                        'latitude' => '',
                    ],
                ]
            ];

            $client = ClientBuilder::create()->build();
            $return = $client->index($data);
            if($return)
                print("okkkkkkk");
            else
                print("Non okkkk");
        }
    }
