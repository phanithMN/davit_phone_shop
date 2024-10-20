<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
    use HasFactory;
    public $table = "permissions";
    public $primaryKey = 'id';
    public $incrementing = true;
    public $timestamp = false;

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'role_permissions');
    }
}
