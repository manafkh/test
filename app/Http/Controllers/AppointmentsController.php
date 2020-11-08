<?php

namespace App\Http\Controllers;

use App\Expert;
use Illuminate\Http\Request;

class AppointmentsController extends Controller
{
    public function index(){

        $experts = Expert::all();
        return response()->json($experts);
    }

    public function details($id){

        $expert = Expert::find($id);
        return response()->json($expert);
    }

    public function appointment(){

    }
}
