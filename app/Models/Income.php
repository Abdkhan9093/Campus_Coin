<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Income extends Model
{
    use SoftDeletes;

    protected $fillable = ['user_id', 'category_id', 'income_date', 'source', 'description', 'amount', 'recurring'];

    protected $casts = ['income_date' => 'date', 'amount' => 'decimal:2', 'recurring' => 'boolean'];

    public function user() { return $this->belongsTo(User::class); }
    public function category() { return $this->belongsTo(Category::class); }
}
