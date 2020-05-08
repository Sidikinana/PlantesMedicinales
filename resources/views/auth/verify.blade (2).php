@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7" style="margin-top: 2%">
                <div class="box">
                    <h3 class="box-title" style="padding: 2%">Vérifiez votre adresse électronique</h3>

                    <div class="box-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">Un nouveau lien de vérification a été envoyé à
                                votre adresse électronique
                            </div>
                        @endif
                        <p>Avant de poursuivre, veuillez vérifier votre courriel pour un lien de vérification. Si vous n'avez pas reçu
                            le courrier électronique,</p>
                        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                            @csrf
                            <button type="submit" class="btn btn-link">
                                cliquez ici pour en demander une autre
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection