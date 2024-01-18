<?php

namespace App\Http\Controllers;

use App\Models\property;
use App\DataTables\PropertiesDataTable;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::get();


        // dd($propertiesDataTable);
        return view('property.index', ['properties' => $properties]);
        // return $dataTable->render('property.index');
    }
    public function create()
    {
        return view('property.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'type_name' => 'required',
            'description' => 'required',
            'property_ican' => 'required',
        ]);
        $property = new property();
        $property->type_name = $request->type_name;
        $property->description = $request->description;
        $property->type_ican = $request->property_ican;
        $property->save();
        return redirect()->route('property.alltype')->with('message', 'property added successfully');
    }
}
