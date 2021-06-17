<?php

namespace App\Http\Controllers\Dashboard;

use App\Unit;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UnitController extends Controller
{
    public function index(Request $request)
    {
        $units = Unit::all();
       return Product::with('unit')->get();
        return view('dashboard.unit.index', compact('units')); 
    }

    public function create()
    {
        return view('dashboard.unit.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'unit_name' => 'required|unique:units,unit_name',
            'unit_piece' => 'required',

        ]);
        //return $request;
        $unit= new Unit();
        $unit->unit_name=$request->unit_name;
        $unit->details=$request->details;
        $unit->unit_piece=$request->unit_piece;
        $unit->unit_conversion=(1/$request->unit_piece);
        $unit->save();
        toast('Unit created Successfully', 'success', 'top-right');
        return redirect()->route('unit.index'); 
    }
}
