<?php

namespace App\Models;

use App\Models\City;
use App\Models\Campaign;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Group extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    protected $table = 'groups_app';

    public function city()
    {
        return $this->belongsToMany(City::class, 'groups_cities', 'group_id', 'city_id');
    }

    public function campaign()
    {
        return $this->belongsToMany(Campaign::class, 'campaigns_groups', 'group_id', 'campaign_id');
    }
}
