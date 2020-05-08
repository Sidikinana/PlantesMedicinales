<!-- Nomscientifique Field -->
<div class="form-group">
    {!! Form::label('nomScientifique', 'Nomscientifique:') !!}
    {{ $plante->nomScientifique }}
</div>

<!-- Espece Field -->
<div class="form-group">
    {!! Form::label('espece', 'Espece:') !!} {{ $plante->espece }}
</div>

<!-- Famille Field -->
<div class="form-group">
    {!! Form::label('famille', 'Famille:') !!}
    {{ $plante->famille }}
</div>

<!-- Nommoore Field -->
<div class="form-group">
    {!! Form::label('nomMoore', 'Nommoore:') !!}
    {{ $plante->nomMoore }}
</div>

<!-- Nomdioula Field -->
<div class="form-group">
    {!! Form::label('nomDioula', 'Nomdioula:') !!}
    {{ $plante->nomDioula }}
</div>

<!-- Nomfulfulde Field -->
<div class="form-group">
    {!! Form::label('nomFulfulde', 'Nomfulfulde:') !!}
    <p>{{ $plante->nomFulfulde }}</p>
</div>

<!-- Endanger Field -->
<div class="form-group">
    {!! Form::label('enDanger', 'Endanger:') !!}
    <p>{{ $plante->enDanger }}</p>
</div>

<!-- Photo Field -->
<div class="form-group">
    {!! Form::label('photo', 'Photo:') !!}
    <p>{{ $plante->photo }}</p>
</div>

