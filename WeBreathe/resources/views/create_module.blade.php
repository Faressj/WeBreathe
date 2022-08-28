<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Créer Module</title>
        <link rel="icon" href="/assets/img/Webreathe.png" type="image/icon type">
        <link rel="stylesheet" href="/assets/css/create.css">
        <link rel="stylesheet" href="/assets/css/navbar.css">
    </head>
    <body>
        <nav>
            <ul class="nav-links">
                <li><a href='http://localhost:8000/'>Accueil</a></li>
                <li><a href='http://localhost:8000/create'>Créer</a></li>
            </ul>
        </nav>
            <div>
                @if (Session::get('success'))
                    <h1 class="alert alert-success">
                        {{ Session::get('success')}}
                    </h1>
                @endif

                @if (Session::get('fail'))
                    <div class="alert alert-danger">
                        {{ Session::get('fail')}}
                    </div>
                @endif
                <form action="add" method="post">
                    <div class="segment">
                        <h1>Créer un module</h1>
                        </div>
                    @csrf
                    <div>
                        <label for="">Nom du module</label>
                        <input type="text" name="name" placeholder="Nom du module" value="{{ old('name') }}">
                        <span style="color:red">@error('name'){{ $message }} @enderror</span>
                    </div>
                    
                    <div>
                        <label for="">Type du module</label>
                        <select name="type" value="{{ old('type') }}">
                            <option value="">--Please choose an option--</option>
                                <option value="temperature_sensor">Capteurs de Température (°C)</option>
                                <option value="humidity_sensor">Capteur d'humidité (g/m3)</option>
                                <option value="pression_sensor">Capteur de pression (Pa)</option>
                                <option value="proximity_sensor">Capteur de proximité (cm)</option>
                                <option value="level_sensor">Capteur de niveau (m)</option>
                                <option value="gyroscope_sensor">Gyroscope (°)</option>
                                <option value="toxicity_sensor">Capteur de Toxicité (DL)</option>
                                <option value="infrared_sensor">Capteur infrarouge (nm)</option>
                        </select>
                        <span style="color:red">@error('type'){{ $message }} @enderror</span>

                    </div>


                        <button class="red" type="submit"><i class="icon ion-md-lock"></i> Créer</button>
                </form>
            </div>
    </body>
</html>