<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departament extends Model
{
    public $timestamps = false;
    protected $fillable = ['departament_name'];
}
