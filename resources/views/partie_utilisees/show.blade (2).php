@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Partie Utilisee
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('partie_utilisees.show_fields')
                    <a href="{{ route('partieUtilisees.index') }}" class="btn btn-default">Retour</a>
                </div>
            </div>
        </div>
    </div>
@endsection
