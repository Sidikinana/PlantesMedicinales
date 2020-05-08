@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Zone Rencontree
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('zone_rencontrees.show_fields')
                    <a href="{{ route('zoneRencontrees.index') }}" class="btn btn-default">Retour</a>
                </div>
            </div>
        </div>
    </div>
@endsection
