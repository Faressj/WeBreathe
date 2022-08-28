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
        @php 
            $module = DB::table('modules')
            ->where('id', '=', $modulee)
            ->get();
            $array = json_decode(json_encode($module), true);
            if($array != null){
                $module = $array[0];
            }

            $moduledata1int =  DB::table('modules_values')
            ->where('id', '=', $modulee)
            ->orderBy('moment_value', 'desc')
            ->limit(10)
            ->get();
            $arraymodule = json_decode(json_encode($moduledata1int), true);
            if(array_key_exists(9,$arraymodule)){
                $alert = "";
                $unity =  $arraymodule[0]['val_1_txt'];
                $arrayvalue0 = $arraymodule[0]['val_1_int'];
                $arrayvalue1 = $arraymodule[1]['val_1_int'];
                $arrayvalue2 = $arraymodule[2]['val_1_int'];
                $arrayvalue3 = $arraymodule[3]['val_1_int'];
                $arrayvalue4 = $arraymodule[4]['val_1_int'];
                $arrayvalue5 = $arraymodule[5]['val_1_int'];
                $arrayvalue6 = $arraymodule[6]['val_1_int'];
                $arrayvalue7 = $arraymodule[7]['val_1_int'];
                $arrayvalue8 = $arraymodule[8]['val_1_int'];
                $arrayvalue9 = $arraymodule[9]['val_1_int'];
                
                $moment_value1 =substr($arraymodule[0]['moment_value'],11,20);
                $moment_value2 =substr($arraymodule[1]['moment_value'],11,20);
                $moment_value3 =substr($arraymodule[2]['moment_value'],11,20);
                $moment_value4 =substr($arraymodule[3]['moment_value'],11,20);
                $moment_value5 =substr($arraymodule[4]['moment_value'],11,20);
                $moment_value6 =substr($arraymodule[5]['moment_value'],11,20);
                $moment_value7 =substr($arraymodule[6]['moment_value'],11,20);
                $moment_value8 =substr($arraymodule[7]['moment_value'],11,20);
                $moment_value9 =substr($arraymodule[8]['moment_value'],11,20);
                $moment_value10 =substr($arraymodule[9]['moment_value'],11,20);
            }else{
                $alert = "Si votre module vient d'être créé, patientez 10 minutes pour que vos valeurs s'affichent";
                $unity = $arraymodule[0]['val_1_txt'];
                $arrayvalue0 = 0;
                $arrayvalue1 = 0;
                $arrayvalue2 = 0;
                $arrayvalue3 = 0;
                $arrayvalue4 = 0;
                $arrayvalue5 = 0;
                $arrayvalue6 = 0;
                $arrayvalue7 = 0;
                $arrayvalue8 = 0;
                $arrayvalue9 = 0;
                $moment_value1 ='null';
                $moment_value2 ='null';
                $moment_value3 ='null';
                $moment_value4 ='null';
                $moment_value5 ='null';
                $moment_value6 ='null';
                $moment_value7 ='null';
                $moment_value8 ='null';
                $moment_value9 ='null';
                $moment_value10 ='null';
            }
        @endphp

        @if ($array != null)
            <h1>Module : {{ $module['name'] }}</h1>
            <div class="module">
                <div class=modules_names>
                    <p class="subtitle"><u>Nom du module :</u> {{$module['name']}}</p>
                </div>
                <div class=modules_type>
                    <p class="subtitle"><u>type du module :</u> {{$module['type']}}</p>
                </div>
                <div class=modules_type>
                    <p class="subtitle"><u>unité de la valeur :</u> {{$unity}} </p>
                </div>
                <div class=modules_state>
                    <p class="subtitle"><u>Etat du module :</u> 
                        @if ($module['state'] == 'ON')
                            <span class="clignotegreen"> {{$module['state']}}</span>
                        @else
                            <span class="clignotered"> {{$module['state']}}</span>
                        @endif
                </div>
                <div class=modules_date>
                    <p class="subtitle"><u>Mise en fonctionnement :</u> {{$module['created_at']}}</p>
                </div>
            </div>   
            {{$alert}}
            @else
                <h1>Le module que vous recherchez n'existe pas</h1>
            @endif
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
            <script type="text/javascript">
                google.charts.load('current', {'packages':['corechart']});
                google.charts.setOnLoadCallback(drawChart);
        
                function drawChart() {

                    var data = google.visualization.arrayToDataTable([
                        ['Heure', 'Valeur mesurée'],
                        [<?php echo json_encode($moment_value10)?>,  <?php echo $arrayvalue0?>],
                        [<?php echo json_encode($moment_value9)?>,  <?php echo $arrayvalue1?>],
                        [<?php echo json_encode($moment_value8)?>,  <?php echo $arrayvalue2?>],
                        [<?php echo json_encode($moment_value7)?>,  <?php echo $arrayvalue3?>],
                        [<?php echo json_encode($moment_value6)?>,  <?php echo $arrayvalue4?>],
                        [<?php echo json_encode($moment_value5)?>,  <?php echo $arrayvalue5?>],
                        [<?php echo json_encode($moment_value4)?>,  <?php echo $arrayvalue6?>],
                        [<?php echo json_encode($moment_value3)?>,  <?php echo $arrayvalue7?>],
                        [<?php echo json_encode($moment_value2)?>,  <?php echo $arrayvalue8?>],
                        [<?php echo json_encode($moment_value1)?>,  <?php echo $arrayvalue9?>]
                    ]);

                    var options = {
                        title: <?php echo json_encode($unity) ?>,
                        curveType: 'function',
                        legend: { position: 'bottom' }
                    };
        
                    var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
                    chart.draw(data, options);
                }
            </script>
            <div id="curve_chart" style=""></div>
    </body>
</html>