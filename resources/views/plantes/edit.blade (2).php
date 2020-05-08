@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Plante
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($plante, ['route' => ['plantes.update', $plante->id], 'method' => 'patch']) !!}

                        @include('plantes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection