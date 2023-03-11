<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>{{ env('APP_NAME') }}</title>
  </head>
  <body>
    
    <nav class="navbar navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="http://127.0.0.1:8000">
          ISIEmploi
        </a>
        @guest
        <div>
            <a href="{{ route('login') }}" class="btn btn-primary">Connexion</a>
            <a href="{{ route('register') }}" class="btn btn-secondary">Inscription</a>
        </div>
        @endguest
        

        @auth

        <ul class="nav nav-pills">
          <li class="nav-item">
            <a class="btn btn-outline-primary" aria-current="page" href="{{ route('home') }}">Accueil</a>
          </li>&nbsp;
          @if (auth()->user()->type == "entreprise")
            <li class="nav-item">
              <a class="btn btn-outline-primary" aria-current="page" href="http://127.0.0.1:8000/add-postes">Faire une Offre</a>
            </li>&nbsp;
            <li class="nav-item">
              <a class="btn btn-outline-primary" aria-current="page" href="http://127.0.0.1:8000/liste-postes">Liste des Offres postés</a>
            </li>&nbsp;
            <li class="nav-item">
              <a class="btn btn-outline-primary" aria-current="page" href="http://127.0.0.1:8000/liste-notifications">Notifications</a>
            </li>&nbsp;
          @endif

          @if (auth()->user()->type == "demandeur")
          <li class="nav-item">
            <a class="btn btn-outline-primary" href="#">Offres Postulés</a>
          </li>&nbsp;
          <li class="nav-item">
            <a class="btn btn-outline-primary" href="http://127.0.0.1:8000/mon_cv">Creer CV</a>
          </li>&nbsp;
          <li class="nav-item">
            <a class="btn btn-outline-primary" href="http://127.0.0.1:8000/pdf_display">Voir CV</a>
          </li>
          @endif
        </ul>

        <div class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            @if (auth()->user()->type == "demandeur")
            <img style="margin-bottom: 8px;" src="" width="20" height="20" alt="">&nbsp;
            @else
            <img style="margin-bottom: 8px;" src="" width="20" height="20" alt="">&nbsp;
            @endif
              {{ Auth::user()->name }}
          </a>
          <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

              <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                  {{ __('Deconnexion') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
          </div>
        </div>

        @endauth

        
      </div>
    </nav>
    <br>
    <div>
        @yield('content')
    </div>

     
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

     
  </body>
</html>
