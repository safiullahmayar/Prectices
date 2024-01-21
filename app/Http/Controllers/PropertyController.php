<?php

namespace App\Http\Controllers;

use App\Models\property;
use App\DataTables\PropertiesDataTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function store(Request $request, $id)
    {
        $request->validate([
            'type_name' => 'required',
            'description' => 'required',
            'property_ican' => 'required',
        ]);
        $property = property::find($id);
        $item = [
            'type_name' => $request->type_name,
            'description' => $request->description,
            'type_ican' => $request->property_ican,
        ];
        $property->save($item);
        return redirect()->route('property.alltype')->with('message', 'property added successfully');
    }

    public function edit($id)
    {
        $property = property::where('id', $id)->first();
        return view('property.edit', ['property' => $property]);
    }
    public function update(Request $requsest)
    {
        
        $validate = $requsest->validate([
            'type_name' => 'required',
            'description' => 'required',
            'property_ican' => 'required',
        ]);
        if ($validate) {
            $property = property::where('id', $requsest->id)->first();
            $property->type_name = $requsest->type_name;
            $property->description = $requsest->description;
            $property->type_ican = $requsest->property_ican;
            $property->save();
            return redirect()->route('property.alltype')->with('message', 'property updated successfully');
        } else {
            return redirect()->back()->with('message', 'property not updated');
        }
    }
    public function destroy($id)
    {
        $property = property::where('id', $id)->first();
        $property->delete();
        return redirect()->route('property.alltype')->with('message', 'property deleted successfully');
    }
}
