<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Group;
use App\Models\GroupCity;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::all()->toArray();
        $cities = Group::with('city')->get();
        return response()->json(['groups' => array_reverse($groups), 'cities' => $cities]);
    }

    public function store(Request $request)
    {
        //return response()->json($request->cities);
        $group = new Group([
            'name' => $request->name
        ]);

        $group->save();

        $cities = $request->input('cities');
        //return response()->json($cities);
        foreach ($cities as $city_id) {
            //$city = City::findOrFail($city_id->id);

            $group_cities = new GroupCity([
                'group_id' => (int)$group->id,
                'city_id' => (int)$city_id,
            ]);
            $fou = $city_id;
            $group_cities->save();
        }

        return response()->json('Inserido com sucesso!');
    }

    public function show($id)
    {
        $group = Group::find($id);
        //$finally = $group->city()->get();
        //$cities = City::with('group')->where('group_id', '=', $id)->get();

        $cities = City::whereHas('group', function (Builder $query) use($id){
            $query->where('group_id', '=', $id);
        })->get();

        return response()->json(['group' => $group, 'cities' => $cities]);
    }

    public function update($id, Request $request)
    {
        $group = Group::find($id);
        $group->update($request->all());
        return response()->json('Grupo atualizado!');
    }

    public function destroy($id)
    {
        $group = Group::find($id);
        $group->delete();
        return response()->json('Grupo deletado!');
    }
}
