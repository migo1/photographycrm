<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'user_id', 'contact', 'bio', 'image', 'address', 
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
