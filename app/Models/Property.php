<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    //protected $guarded = ['id', 'public_id', 'owner_id', 'rating', 'priority'];
    protected $fillable = [
        'name', 'address', 'latitude', 'longitude', 'description', 'website', 'phone', 'email'
    ];
    protected $hidden = [
        'id', 'owner_id', 'created_at', 'updated_at', 'priority'
    ];

    //protected $appends = ['profile_picture_url'];
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id', 'id');
    }
}
