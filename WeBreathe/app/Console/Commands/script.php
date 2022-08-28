<?php

use App\Models\Modules;
use Illuminate\Support\Facades\DB;

$modules = Modules::all();
$arrayid = [];
$arraytype = [];
foreach($modules as $module){
    array_push($arrayid, $module['id']);
}

//REPARER TOUS LES MODULES EN DECOMMENTANT LES 3 LIGNES DU DESSOUS
// foreach($arrayid as $key => $value){
//         $type = DB::table('modules')->where('id', "=", $value)->update(['state'=>'ON']);
//         echo ('tous les modules sont réparés') . PHP_EOL;
// }

foreach($arrayid as $key => $value){

    $turnoff = rand(0, 100); //Generation d'un chiffre aléatoire pour faire tomber le module en panne
    $turnon = rand(0, 50); //Generation d'un chiffre aléatoire pour réparer le module
    $state = DB::table('modules')->select('state')->where('id', "=", $value)->get(); // Etat actuel du module
    $state = json_decode(json_encode($state), true);
    $state = $state[0]['state'];
    if($state == 'ON' && $turnoff == 100){ 
        $state = DB::table('modules')->where('id', "=", $value)->update(['state'=>'OFF']);
    }
    if($state == 'OFF' && $turnon == 50){
        $state = DB::table('modules')->where('id', "=", $value)->update(['state'=>'ON']);
    }


    $type = DB::table('modules')->select('type')->where('id', "=", $value)->get();
    array_push($arraytype, $type);
    $type = json_decode(json_encode($type), true);
    $type = $type[0]['type'];
    if($type == 'temperature_sensor'){
        $unity = '°C';
        $random = rand(30, 40);
    }elseif($type == 'humidity_sensor'){
        $unity = '%';
        $random = rand(10, 60);
    }elseif($type == 'pression_sensor'){
        $unity = 'Pa';
        $random = rand(1, 10);
    }elseif($type == 'proximity_sensor'){
        $unity = 'cm';
        $random = rand(0, 200);
    }elseif($type == 'level_sensor'){
        $unity = 'm';
        $random = rand(0, 10);
    }elseif($type == 'gyroscope_sensor'){
        $unity = '°';
        $random = rand(0, 360);
    }elseif($type == 'toxicity_sensor'){
        $unity = 'DL';
        $random = rand(0, 10);
    }elseif($type == 'infrared_sensor'){
        $unity = 'nm';
        $random = rand(780, 1000);
    }
    if($state == 'ON'){
        DB::table('modules_values')->insert([
            'id'=>$value,
            'val_1_int'=>$random,
            'val_1_txt'=>$unity,
            'val_2_int'=>null,
            'val_2_txt'=>null,
            'val_3_int'=>null,
            'val_3_txt'=>null,
            'val_4_int'=>null,
            'val_4_txt'=>null,
            'moment_value'=>now()
        ]);
    }
}