<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Builder\Property;

class PropertyController extends Controller
{
public function index()
    {
        // $properties = Property::all();
        return view('property.index');
    }

}
