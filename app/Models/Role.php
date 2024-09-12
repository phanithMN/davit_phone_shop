<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $table = "roles";
    public $primaryKey = 'id';
    public $incrementing = true;
    public $timestamp = false;
}
