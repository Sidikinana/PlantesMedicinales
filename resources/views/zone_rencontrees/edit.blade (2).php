@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Zone Rencontree
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($zoneRencontree, ['route' => ['zoneRencontrees.update', $zoneRencontree->id], 'method' => 'patch']) !!}

                        @include('zone_rencontrees.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection