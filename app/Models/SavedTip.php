<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SavedTip extends Model
{
    protected $fillable = ['user_id', 'title', 'text'];
}
