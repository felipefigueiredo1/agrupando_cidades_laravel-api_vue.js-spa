<?php

namespace App\Http\Controllers;

use App\Models\GroupCity;
use Illuminate\Http\Request;

class GroupCityController extends Controller
{
    public function destroy($id)
    {
        $pivot = GroupCity::where('city_id', $id)->delete();

        return response()->json('Deletado com sucesso!');
    }
}
