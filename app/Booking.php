<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id', 'category_id', 'date', 'time', 
        'total_photos', 'charges', 'payment_status'
    ];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
