<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="author" content="colorlib.com">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <link href="css/main.css" rel="stylesheet" />
    <title>Plantes Medecinales</title>
  </head>
<style>
            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;

            }

           .ino {
                position: justify;
                text-align: center;
                right: 10px;
                top: 18px;

            }


            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }
  </style>


  <body>
    
    <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Accueil</a>
                    @else
                        <a href="{{ route('login') }}">Se connecter</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">S'inscrire</a>
                        @endif
                    @endauth
                </div>
            @endif
      <div >
    <div class="s130">
      <form class="form-inline" method="GET" action="{{ route('search_vertues') }}">
            @csrf
        <div class="inner-form">
          <div class="input-field first-wrap">
            <div class="svg-wrapper">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
              </svg>
            </div>
            <!-- <input id="search" type="text" placeholder="Rechercher....." /> -->
            <input name="text" class="form-control" id="searchTerm" placeholder="Rechercher.....">
          </div>
          <div class="input-field second-wrap">
            <button class="btn-search" id="searchButton" type="submit">Rechercher</button>
          </div>
        </div>
        <span class="info">ex. Maux, Dents, Ventre, Baobab........</span>
      </form>
    </div>

    <div class="ino">
          @if(isset($resultat['hits']['hits'][0]))
            @foreach($resultat['hits']['hits'] as $vertue)
              Vertue: <a href="{{ route('details', $vertue) }}">{!! $vertue['_source']['nomVertue'] !!}</a> <br>
              Recette: {!! $vertue['_source']['recette'] !!} <br>
              Plante: {!! $vertue['_source']['plantes']['nomScientifique'] !!} <br>
              Image: <img src="{!! asset ("storage".$vertue['_source']['plantes']['photo']) !!}">
              <br>
              <br>
            @endforeach
          @else
            Pas de résultat
          @endif
    </div>
</div>
        <footer class="main-footer" style="max-height: 100px;text-align: center">
            <strong>Copyright © 2020 <a href="http://incubuo.tech/" target="_blank">INCUB@UO</a></strong> Tous droits réservés.
        </footer>

    <script src="js/extention/choices.js"></script>
  </body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>