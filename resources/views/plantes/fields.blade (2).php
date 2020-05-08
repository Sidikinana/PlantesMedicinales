@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/select2-bootstrap.min.css') }}">
@endsection
<!-- Nomscientifique Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nomScientifique', 'Nomscientifique *:') !!}
    {!! Form::text('nomScientifique', null, ['class' => 'form-control']) !!}
</div>

<!-- Espece Field -->
<div class="form-group col-sm-6">
    {!! Form::label('espece', 'Espece *:') !!}
    {!! Form::text('espece', null, ['class' => 'form-control']) !!}
</div>

<!-- Famille Field -->
<div class="form-group col-sm-6">
    {!! Form::label('famille', 'Famille *:') !!}
    {!! Form::text('famille', null, ['class' => 'form-control']) !!}
</div>

<!-- Nommoore Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nomMoore', 'Nommoore *:') !!}
    {!! Form::text('nomMoore', null, ['class' => 'form-control']) !!}
</div>

<!-- Nomdioula Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nomDioula', 'Nomdioula *:') !!}
    {!! Form::text('nomDioula', null, ['class' => 'form-control']) !!}
</div>

<!-- Nomfulfulde Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nomFulfulde', 'Nomfulfulde *:') !!}
    {!! Form::text('nomFulfulde', null, ['class' => 'form-control']) !!}
</div>

<!-- Endanger Field -->
<div class="form-group col-sm-6">
    {!! Form::label('enDanger', 'Endanger:') !!}
    <label class="checkbox-inline">
        {!! Form::hidden('enDanger', 0) !!}
        {!! Form::checkbox('enDanger', '1', null) !!}
    </label>
</div>


<!-- Photo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('photo', 'Photo *:') !!}
    {!! Form::file('photo', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group col-sm-6">
    <label class="control-label">Zones Rencontrées * </label>
    <select id="zoneRencontrees" class="select2 form-control" name="zoneRencontrees[]" multiple="">
        <option value="">&nbsp;</option>
        @foreach($zoneRencontrees as $zone)
        <option value="{{ $zone->id }}">{{ $zone->nomzone }}</option>
        @endforeach
    </select>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Enregister', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('plantes.index') }}" class="btn btn-default">Annuler</a>
</div>
@section('scripts')
<script type="text/javascript" src="{{ asset('js/select2.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.select2').select2({
            maximumSelectionLength: 2
            placeholder: 'This is my placeholder',
            allowClear: true
            tags:[]
        });
    });
</script>
@endsection