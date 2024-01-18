<?php

namespace App\Http\Controllers;
use App\Models\property;
use App\DataTables\PropertiesDataTable;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
public function index( )
    {
        $properties = Property::get();


        // dd($propertiesDataTable);
        return view('property.index',['properties'=>$properties]);
        // return $dataTable->render('property.index');
    }

}
