<?php

namespace App\Http\Controllers;

use App\Models\property;
use App\DataTables\PropertiesDataTable;
use App\Models\Amenties;
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
    public function store(Request $request)
    {
        $request->validate([
            'type_name' => 'required',
            'description' => 'required',
            'property_ican' => 'required',
        ]);
        property::create(
            [
                'type_name' => $request->type_name,
                'description' => $request->description,
                'type_ican' => $request->property_ican,
            ]
        );

        return redirect()->route('property.alltype')->with('message', 'new property type successfully added');
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
    // end of perproperty function
    public function allamenites()
    {
        $amenties = amenties::get();


        // dd($propertiesDataTable);
        return view('amenites.index', ['amenties' => $amenties]);
        // return $dataTable->render('amenties.index');
    }
    public function create_amenites()
    {
        return view('amenites.create');
    }
    public function add_amenites(Request $request)
    {
        $request->validate([
            'amenites_name' => 'required',
        ]);
        amenties::create(
            [
                'amenites_name' => $request->amenites_name,

            ]
        );

        return redirect()->route('amenites.allamenites')->with('message', 'new amenties type successfully added');
    }

    public function edit_amenites($id)
    {
// dd($id);
        $amenties = amenties::where('id', $id)->first();
        return view('amenites.edit', ['amenties' => $amenties]);
    }
    public function update_amenites(Request $requsest)
    {
        $validate = $requsest->validate([
            'amenites_name' => 'required',

        ]);
        if ($validate) {
            $amenties = amenties::where('id', $requsest->id)->first();
            $amenties->amenites_name = $requsest->amenites_name;

            $amenties->save();
            return redirect()->route('amenites.allamenites')->with('message', 'amenties updated successfully');
        } else {
            return redirect()->back()->with('message', 'amenties not updated');
        }
    }
    public function amenites_destroy($id)
    {
        $amenties = Amenties::where('id', $id)->first();
        $amenties->delete();
        return redirect()->route('amenites.allamenites')->with('message', 'amenties deleted successfully');
    }
}
