<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::all()->toArray();
        $citiess = City::with('group')->get();

        return response()->json(['cities' =>  array_reverse($cities), 'citiess' => $citiess]);
    }

    public function store(Request $request)
    {
        $city = new City([
            'name' => $request->input('name'),
        ]);

        $city->save();

        return response()->json('Cidade criada!');
    }

    public function show($id)
    {
        $city = City::find($id);
        return response()->json($city);
    }

    public function update($id, Request $request)
    {
        $city = City::find($id);
        $city->update($request->all());
        return response()->json('Cidade atualizada!');
    }

    public function destroy($id)
    {
        $city = City::find($id);
        $city->delete();
        return response()->json('Cidade deletada!');
    }
}
