<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>WeBreathe</title>
        <link rel="icon" href="/assets/img/Webreathe.png" type="image/icon type">
        <link rel="stylesheet" href="/assets/css/style.css">
        <link rel="stylesheet" href="/assets/css/navbar.css">
    </head>

    <body>
        <nav>
            <ul class="nav-links">
                <li><a href='http://localhost:8000/'>Accueil</a></li>
                <li><a href='http://localhost:8000/create'>Créer</a></li>
            </ul>
        </nav>
        <div class="modules">
            @php
                $array = json_decode(json_encode($modules), true);
            @endphp
            @if($array == null)
                <h1>Aucun module existant</h1>
                <h2>Cliquez sur <b>Créer</b> pour en créer un</h2>
            @else
                @foreach ($modules as $module)
                <div class="module">
                    <div class=modules_names>
                        <p class="subtitle"><u>Nom du module :</u> {{$module['name']}}</p>
                    </div>
                    <div class=modules_type>
                        <p class="subtitle">
                            <u>Type de valeurs mesurées :</u> 
                            @if ($module['type']  == 'temperature_sensor')
                                La Température (en °C)</p>
                                @endif
                            @if ($module['type'] == 'humidity_sensor')
                                L'humidité en (g/m3)</p>
                                @endif
                            @if ($module['type'] == 'pression_sensor')
                                La Pression (en Pa)</p>
                                @endif
                            @if ($module['type'] == 'proximity_sensor')
                                La proximité (en cm)</p>
                                @endif
                            @if ($module['type'] == 'level_sensor')
                                Le niveau du liquide (en mm)</p>
                                @endif
                            @if ($module['type'] == 'gyroscope_sensor')
                                L'1ngle d'inclinaison (en °)</p>
                                @endif
                            @if ($module['type'] == 'toxicity_sensor')
                                La toxicité de l'air (en %)</p>
                                @endif
                            @if ($module['type'] == 'infrared_sensor')
                                Les radiations infrarouges (en nm)</p>
                            @endif
                    </div>
                    <div class=modules_number_of_values>
                        <p class="subtitle"><u>Nombre de valeurs mesurées :</u> {{$module['number_of_values']}}</p>
                    </div>
                    <div class=modules_state>
                        <p class="subtitle"><u>Etat du module :</u>
                            @if ($module['state'] == 'ON')
                                <span class="clignotegreen"> {{$module['state']}}</span>
                            @else
                                <span class="clignotered"> {{$module['state']}}</span>
                            @endif
                            </p>
                    </div>
                    <div class=modules_date>
                        <p class="subtitle"><u>Mise en fonctionnement :</u> {{$module['created_at']}}</p>
                    </div>
                    <div class="buttons">
                        <button class="button"><a href='http://localhost:8000/module/{{ $module['id'] }}'>Détails</a></button>
                    </div>
                </div>
                @endforeach
                @endif
        </div>
    </body>
</html>