<?php

namespace Sisgera\Models;

use Illuminate\Database\Eloquent\Model;


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
