@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Region Pratiquee
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($regionPratiquee, ['route' => ['regionPratiquees.update', $regionPratiquee->id], 'method' => 'patch']) !!}

                        @include('region_pratiquees.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection