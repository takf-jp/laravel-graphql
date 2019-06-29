<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    // favorites.favorite_at を created_at や updated_at と同様に Carbon で扱うために、 $dates に追加
    protected $dates = ['favorite_at'];
    protected $guarded = [];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
