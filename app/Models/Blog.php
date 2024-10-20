<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public $table = "blogs";
    public $primaryKey = 'id';
    public $incrementing = true;
    public $timestamp = false;
}
