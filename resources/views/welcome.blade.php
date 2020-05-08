<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Plantes Medecinales</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../public/css/search.css">

        <!-- Styles -->
        <style>
            /*html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }*/

            .full-height {
                height: 93vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
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

            .m-b-md {
                margin-bottom: 30px;
            }

            @import url(https://fonts.googleapis.com/css?family=Open+Sans);

            body{
              background: #f2f2f2;
              font-family: 'Open Sans', sans-serif;
            }

            .search {
              width: 100%;
              position: relative;
              display: flex;
            }

            .searchTerm {
              width: 100%;
              border: 2px solid grey;
              border-right: none;
              padding: 5px;
              height: 20px;
              border-radius: 5px 0 0 5px;
              outline: none;
              color: #9DBFAF;
            }

            .searchTerm:focus{
              color: #00B4CC;
            }

            .searchButton {
              width: 20%;
              height: 33px;
              border: 2px solid #00b4cc;
              background: #00b4cc;
              text-align: center;
              color: #fff;
              border-radius: 0 5px 5px 0;
              cursor: pointer;
              font-size: 20px;
            }
            /*Resize the wrap to see the search bar change!*/
            .wrap{
              width: 40%;
              position: absolute;
              top: 30%;
              left: 50%;
              transform: translate(-50%, -50%);
            }




        </style>
    </head>
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

            {{form::open(['method'=>'get', 'route'=>'search_vertues'])}}
            {{form::text('query', $text)}}
            {{form::submit('Rechercher')}}
            {{form::close()}}

            <!-- <form class="form-inline" method="POST" action="{{ route('search_vertues') }}">
            @csrf
            <div class="form-group row">
                <label for="searchTerm" class="col-sm-4 col-form-label">Search term</label>
                <div class="col-sm-6">
                    <input name="text" class="form-control" id="searchTerm" placeholder="Batman">
                </div>
            </div>
            <div class="form-group row" style="margin-left: 10px">
                <button type="submit" id="searchButton" style="margin-left: 20%" class="btn btn-primary">Search</button>
            </div>
        </form> -->


        </div>
        <footer class="main-footer" style="max-height: 100px;text-align: center">
            <strong>Copyright © 2020 <a href="http://incubuo.tech/" target="_blank">INCUB@UO</a></strong> Tous droits réservés.
        </footer>

    </body>
</html>
