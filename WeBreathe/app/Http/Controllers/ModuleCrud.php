<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModuleCrud extends Controller
{
    function index(){
        return view('create_module');
    }
    function add(Request $request){

        $request->validate([
            'name'=>'required',
            'type'=>'required',
        ]);

        $query = DB::table('modules')->insert([
            'name'=>$request->input('name'),
            'type'=>$request->input('type'),
            'number_of_values'=>'1',
            'state'=>'ON',
            'created_at'=>now(),
            'updated_at'=>now()
        ]);

        if($query){

            return back()->with('success','Votre module a bien été créé');
        }else{
            return back()->with('fail','Erreur lors de la création');
        }
    }
}
 