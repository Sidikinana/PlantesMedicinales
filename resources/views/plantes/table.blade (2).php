<div class="table-responsive">
    <table class="table" id="plantes-table">
        <thead>
        <tr>
            <th>Nom Scientifique</th>
            <th>Espece</th>
            <th>Famille</th>
            <th>Nom Moore</th>
            <th>Nom Dioula</th>
            <th>Nom Fulfude</th>
            <th>En danger</th>
            <th>Photo</th>
            <th>Zones Rencontrées</th>
            <th colspan="3">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($plantes as $plante)
            <tr>
                <td>{!! $plante->nomScientifique !!}</td>
                <td>{!! $plante->espece !!}</td>
                <td>{!! $plante->famille !!}</td>
                <td>{!! $plante->nomMoore !!}</td>
                <td>{!! $plante->nomDioula !!}</td>
                <td>{!! $plante->nomFulfude !!}</td>
                <td>{!! $plante->enDanger !!}</td>
                <td><img src="{!! asset("storage".$plante->photo) !!}"></td>
                <td>
                	@if(isset($plante->zoneRencontrees))
                		@foreach($plante->zoneRencontrees as $zone)
                			{!! $zone->nomzone !!}<br>
                		@endforeach
                	@endif
                </td>
                <td>
                    {!! Form::open(['route' => ['plantes.destroy', $plante->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('plantes.show', [$plante->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('plantes.edit', [$plante->id]) !!}" class='btn btn-default btn-xs'><i
                                class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Êtes-vous sûr?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
