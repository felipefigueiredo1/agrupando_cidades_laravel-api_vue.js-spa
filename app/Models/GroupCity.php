<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupCity extends Model
{
    use HasFactory;

    protected $fillable = ['city_id', 'group_id'];
    protected $table = 'groups_cities';

    /*public function group()
    {
        $this->hasMany(Group::class);
    }

    public function cities()
    {
        $this->hasMany(City::class);
    }*/
}
