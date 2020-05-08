@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Vertue
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('vertues.show_fields')
                    <a href="{{ route('vertues.index') }}" class="btn btn-default">Retour</a>
                </div>
            </div>
        </div>
    </div>
@endsection
