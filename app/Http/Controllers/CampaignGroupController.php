<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CampaignGroup;

class CampaignGroupController extends Controller
{
    public function destroy($id)
    {
        $pivot = CampaignGroup::where('group_id', $id)->delete();

        return response()->json('Deletado com sucesso!');
    }
}
