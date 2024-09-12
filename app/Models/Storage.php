<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    public $table = "storages";
    public $primaryKey = 'id';
    public $incrementing = true;
    public $timestamp = false;
}
