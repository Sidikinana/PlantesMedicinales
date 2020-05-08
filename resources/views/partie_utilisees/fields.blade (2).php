<!-- Nompartie Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nomPartie', 'Nom partie *:') !!}
    {!! Form::text('nomPartie', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Enregistrer', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('partieUtilisees.index') }}" class="btn btn-default">Annuler</a>
</div>
