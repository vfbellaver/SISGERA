<?php

namespace Sisgera\Models;

use Illuminate\Database\Eloquent\Model;
use Sisgera\User;

class Role extends Model
{
    protected $fillable = [
        'name',
    ];

    public function roles()
    {
        return $this->belongsToMany(User::class);
    }
}
