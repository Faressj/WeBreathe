<?php
namespace App\Http\Controllers;
use App\Models\Modules;
use Illuminate\Support\Facades\DB;

class ModulesController extends Controller
{

    public function show()
    {
        $modules = Modules::all();
        return view('welcome', compact('modules'));
    }
    public function data()
    {
        $data = Modules::all();
        return view('module', compact('data'));
    }
}