<?php

namespace App\Models;

use App\Models\GroupCity;
use App\Models\Group;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory;

    protected $fillable = ['name'];
    protected $table = 'cities';

    public function group()
    {
        return $this->belongsToMany(Group::class, 'groups_cities', 'city_id', 'group_id');
    }
}
