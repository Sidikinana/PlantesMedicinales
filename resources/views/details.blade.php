<!DOCTYPE html>
<html>
<head>
	<title>Details</title>
</head>
<body>
	<h1>Details de la vertue</h1>
	<div>
		@if(isset($vertue['hits']['hits'][0]))
			Vertue:{!! $vertue['_source']['nomVertue'] !!}</a> <br>
            Recette: {!! $vertue['_source']['recette'] !!} <br>
            Plante: {!! $vertue['_source']['plantes']['nomScientifique'] !!} <br>
            Image: <img src="{!! asset ("storage".$vertue['_source']['plantes']['photo']) !!}">
        @endif
	</div>
</body>
</html>