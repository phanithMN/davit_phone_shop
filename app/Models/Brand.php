<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public $table = "brands";
    public $primaryKey = 'id';
    public $incrementing = true;
    public $timestamp = false;
}
