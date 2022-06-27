<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignGroup extends Model
{
    use HasFactory;
    protected $fillable = ['group_id', 'campaign_id'];
    protected $table = 'campaigns_groups';
}
