<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function doctor()
    {
        $doctors=Doctor::all();
        return view('doctor',compact('doctors'));
    }
}
