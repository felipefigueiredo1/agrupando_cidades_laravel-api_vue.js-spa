<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Campaign;
use Illuminate\Http\Request;
use App\Models\CampaignGroup;
use Illuminate\Database\Eloquent\Builder;

class CampaignController extends Controller
{
    public function index()
    {
        $campaings = Campaign::all()->toArray();
        $groups = Group::with('campaign')->get();

        return response()->json(['campaigns' => $campaings, 'groups' => $groups]);
    }

    public function store(Request $request)
    {
        $campaign = new Campaign([
            'name' => $request->name,
            'descount' => $request->descount,
        ]);

        $campaign->save();

        $groups = $request->input('groups');

        foreach ($groups as $group_id ){

            //$group = Group::findOrFail($group_id);

            $campaign_groups = new CampaignGroup([
                'group_id' => (int)$group_id,
                'campaign_id' => (int)$campaign->id,
            ]);

            $campaign_groups->save();
        }

        return response()->json('Campanha criada!');
    }

    public function show($id)
    {
        $campaign = Campaign::find($id);

        $groups = Group::whereHas('campaign', function (Builder $query) use($id){
            $query->where('campaign_id', '=', $id);
        })->get();


        return response()->json(['campaign' => $campaign, 'groups' => $groups]);
    }

    public function update($id, Request $request)
    {
        $campaign = Campaign::find($id);
        $campaign->update($request->all());
        return response()->json('Campanha atualizada!');
    }

    public function destroy($id)
    {
        $campaign = Campaign::find($id);
        $campaign->delete();
        return response()->json('Campanha deletada!');
    }
}
