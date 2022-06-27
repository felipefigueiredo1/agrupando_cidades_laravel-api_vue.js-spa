<?php

namespace App\Models;

use App\Models\Group;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Campaign extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['name', 'descount'];

    public function group()
    {
        return $this->belongsToMany(Group::class, 'campaigns_groups', 'campaign_id', 'group_id');
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }
}
